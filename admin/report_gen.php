<?php 
require("config.php");
    switch ($_GET['r_type']) {
        case 'payment_report':
            if ($_POST['date']) {
                $to=$_POST['to'];
                $from=$_POST['from'];
                $q=mysqli_query($con , "SELECT pmid,uid,pmtid,amt,p_name from tblpmt WHERE date BETWEEN '$from' AND '$to' ");
                $report = " ";
                while($data = mysqli_fetch_array($q)){
                   $report1 = '<tr>
                        <td>'.$data['pmid'].'</td>
                        <td>'.$data['uid'].'</td>
                        <td>'.$data['pmtid'].'</td>
                        <td>'.$data['amt'].'</td>
                        <td>'.$data['p_name'].'</td>
                    </tr>';
                    $report .= $report1;
                }
                $col_name = '<tr>
                                <th>pmid</th>
                                <th>uid</th>
                                <th>pmtid</th>
                                <th>amt</th>
                                <th>p_name</th>
                            </tr>';
            }
            break;
        case 'property_report':
            if ($_POST['date']) {
                $to=$_POST['to'];
                $from=$_POST['from'];
                $q=mysqli_query($con , "SELECT pid,uid,ptitle,ptype,stype,price from tblhouse WHERE date BETWEEN '$from' AND '$to' ");
                $report = " ";
                while($data = mysqli_fetch_array($q)){
                   $report1 = '<tr>
                        <td>'.$data['pid'].'</td>
                        <td>'.$data['uid'].'</td>
                        <td>'.$data['ptitle'].'</td>
                        <td>'.$data['ptype'].'</td>
                        <td>'.$data['stype'].'</td>
                        <td>'.$data['price'].'</td>
                    </tr>';
                    $report .= $report1;
                }
                $col_name = '<tr>
                                <th>pid</th>
                                <th>uid</th>
                                <th>ptitle</th>
                                <th>ptype</th>
                                <th>stype</th>
                                <th>price</th>
                            </tr>';
            }
            break;
        case 'user_report':
            if ($_POST['date']) {
                $to=$_POST['to'];
                $from=$_POST['from'];
                $q=mysqli_query($con , "SELECT uid,uname,mno,email,address from user WHERE date BETWEEN '$from' AND '$to' ");
                $report = " ";
                while($data = mysqli_fetch_array($q)){
                   $report1 = '<tr>
                        <td>'.$data['uid'].'</td>
                        <td>'.$data['uname'].'</td>
                        <td>'.$data['mno'].'</td>
                        <td>'.$data['email'].'</td>
                        <td>'.$data['address'].'</td>
                    </tr>';
                    $report .= $report1;
                }
                $col_name = '<tr>
                                <th>uid</th>
                                <th>uname</th>
                                <th>mno</th>
                                <th>email</th>
                                <th>address</th>
                            </tr>';
            }
            break;
        
        default:
            # code...
            break;
    }
    include_once('C:/xampp/htdocs/git-main/real-Estate/User/Function/TCPDF-main/TCPDF-main/tcpdf.php');

    //----- Code for generate pdf
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);  
    //$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 12);  
    $pdf->AddPage(); //default A4
    //$pdf->AddPage('P','A5'); //when you require custome page size 

    $content = ''; 
    
	$content .= '<!DOCTYPE html>
    <html>
    <head>
        <title>Report</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 30px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.3);
            }
            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 30px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 30px;
                font-size: 10px;
            }
            table th, table td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: center;
            }
            thead{
                font-weight: bold;
            }
            table th {
                background-color: #f2f2f2;
                color: #333;
                font-weight: bold;
            }
            footer {
                text-align: center;
                color: #666;
                font-size: 12px;
                margin-top: 30px;
                padding-top: 10px;
                border-top: 1px solid #ccc;
            }
            h6{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Locus Property Management</h1>
            <h6>'.$_GET['r_type'].' '.$from.' To '.$to.'</h6>
            <table>
                <thead>
                    '.$col_name.'
                </thead>
                <tbody>
                    '.$report.'
                </tbody>
            </table>
        </div>
    </body>
    </html>
    '; 
$pdf->writeHTML($content);

    // $file_location = "C:/xampp/htdocs\git-main/real-Estate/admin/upload/PDF/"; //add your full path of your server
    $file_location = "C:/xampp/htdocs/git-main/real-Estate/admin/report/".$_GET['r_type']."/"; //for local xampp server
        // $datetime=date('dmY_hms');
        $file_name = "".$_GET['r_type']."".$from."to".$to.".pdf";
        ob_end_clean();


        $pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
//echo "Email send successfully!!";
	error_reporting(E_ALL ^ E_DEPRECATED);	
    header("location:report.php?r_type=".$_GET['r_type']."");
?>


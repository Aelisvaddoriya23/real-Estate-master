<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    function SendMail($email , $sub , $msg){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'locus466@gmail.com';
        $mail->Password = 'pknpemzpfomyiyrz';
        $mail->SMTPSecure = 'ssl';  
        $mail->Port = 465;
        
        $mail->setFrom('locus466@gmail.com');
        
        $mail->addAddress($email);
        
        $mail->isHTML(true);
        
        $mail->Subject = $sub;
        $mail->Body = $msg;

        $mail->send();
        
        // echo
        // "<script>
        //     alert('send success')
        //     document.location.href = 'index.php';
        // </script>";
        }
        
        function SendMail_With_PDF($email , $sub , $msg , $pid){
            
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
            include('C:\xampp\htdocs\git-main\real-Estate\User\config\config.php');

            $p_data=mysqli_fetch_array(mysqli_query($con , "select * from tblhouse where pid='$pid'"));
            $uid = $_SESSION['uid'];
            $u_data=mysqli_fetch_array(mysqli_query($con , "select * from user where uid='$uid'"));
	
	$content = ''; 

	$content .= '
	<!DOCTYPE html>
    <html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>

    <h2 style="text-align: center;">Booking Request From Buyer</h2>
    <div style="width: 50%; margin: auto;">
        <h4 style="text-align: center;">Buyer Information</h4>
        <table style="width:100%">
            <tr>
                <td class="fw-bold text-end">UID :</td>
                <td class="text-start">'.$u_data['uid'].'</td>
            </tr>
            <tr>
                <td class="fw-bold text-end">Name :</td>
                <td class="text-start">'.$u_data['uname'].'</td>
            </tr>
            <tr>
                <td class="fw-bold text-end">Email</td>
                <td class="text-start">'.$u_data['email'].'</td>
            </tr>
            <tr>
                <td class="fw-bold text-end">MNO</td>
                <td class="text-start">'.$u_data['mno'].'</td>
            </tr>
            <tr>
                <td class="fw-bold text-end">Address</td>
                <td class="text-start">'.$u_data['address'].'</td>
            </tr>
        </table>
    </div>
    <div style="width: 50%; margin: auto;">
        <h4 style="text-align: center;">Property Information</h4>
        <table style="width:100%">
            <tr>
                <td class="fw-bold text-end">PID :</td>
                <td class="text-start">'.$p_data['pid'].'</td>
              </tr>
              <tr>
                <td class="fw-bold text-end">Property Title :</td>
                <td class="text-start">'.$p_data['ptitle'].'</td>
              </tr>
              <tr>
                <td class="fw-bold text-end">Location :</td>
                <td class="text-start">'.$p_data['paddress'].'</td>
              </tr>
              <tr>
                <td class="fw-bold text-end">Price :</td>
                <td class="text-start">'.$p_data['price'].'</td>
              </tr>
              <tr>
                <td class="fw-bold text-end">Property Type :</td>
                <td class="text-start">'.$p_data['ptype'].'</td>
              </tr>
              <tr>
                <td class="fw-bold text-end">Selling Type :</td>
                <td class="text-start">'.$p_data['stype'].'</td>
              </tr>
        </table>
    </div>

    <p style="text-align: center;">To understand the example better, we have added borders to the table.</p>

</body>

</html>'; 
$pdf->writeHTML($content);

    $file_location = "C:/xampp/htdocs\git-main/real-Estate/admin/upload/PDF/"; //add your full path of your server
    //$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

        $datetime=date('dmY_hms');
        $file_name = "INV_".$datetime.".pdf";
        ob_end_clean();

        // if($_GET['ACTION']=='VIEW') 
        // {
        //     $pdf->Output($file_name, 'I'); // I means Inline view
        // } 
        // else if($_GET['ACTION']=='DOWNLOAD')
        // {
        //     $pdf->Output($file_name, 'D'); // D means download
        // }
        // else if($_GET['ACTION']=='UPLOAD')
        // {
        // $pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
        // echo "Upload successfully!!";
        // }
        // else if($_GET['ACTION']=='EMAIL')
        // {
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
//echo "Email send successfully!!";
	error_reporting(E_ALL ^ E_DEPRECATED);	

    // require 'phpmailer/src/Exception.php';
    // require 'phpmailer/src/PHPMailer.php';
    // require 'phpmailer/src/SMTP.php';

	$body='';
	$body .="<html>
	<head>
	<style type='text/css'> 
	body {
	font-family: Calibri;
	font-size:16px;
	color:#000;
	}
	</style>
	</head>
	<body>
	Dear Customer,
	<br>
	Please find attached invoice copy.
	<br>
	Thank you!
	</body>
	</html>";

	$mail = new PHPMailer(true);
            $body = 'PDF MAIL' ;
            $mail->isSMTP();
            $mail->Host ='smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'locus466@gmail.com';
            $mail->Password = 'pknpemzpfomyiyrz';
            $mail->SMTPSecure = 'ssl';  
            $mail->Port = 465;
            
            $mail->setFrom('locus466@gmail.com');
    
            $mail->addAddress($email);
			$mail->AddAttachment($file_location.$file_name);
    
            $mail->isHTML(true);
    
            // $mail->Subject = "PDF MAIL";
            // $mail->Body = "PDF MAIL";
            $mail->Subject = $sub;
            $mail->Body = $msg;
    
            $mail->send();
	
}
	



  
?>
<?php
session_start();
include('../config/config.php');
require './sendmail.php';

if (isset($_POST['submit'])) {
  $status = $_POST['status'];
  $reason = $_POST['reason'];
  $bid = $_GET['bid'];
  echo $bid;
  if ($status == "Success") {
    $queary = mysqli_query($con, "UPDATE `tblpbooking` SET `status`='Success',`reason`='$reason' WHERE `bid`= '$bid'");
    if ($queary) {
      $pid = $_GET['pid'];
      $isRent1 = mysqli_fetch_array(mysqli_query($con, "SELECT *  From`tblhouse`  WHERE pid = $pid"));
      $isRent = $isRent1['stype'];

      if ($isRent == "Sell") {
        $Status_Update = mysqli_query($con, "UPDATE `tblhouse` SET `status`='Inactive' WHERE pid = $pid");
      }
      $property_data = mysqli_fetch_array(mysqli_query($con, "SELECT *  From`tblhouse`  WHERE pid = $pid"));

      // if ($Status_Update) {
      $b_email = mysqli_fetch_array(mysqli_query($con, "select * from tblpbooking where bid = $bid"));
      $email = $b_email['email'];

      if ($status == "Success") {
        $sub = "Congratulation Your Deal Is Accepted From Seller...";
        $msg = '<!DOCTYPE html>

                              <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
                                
                                <head>
                                  <title></title>
                                  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                                  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
                                  <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                                  <style>
                                    * {
                                      box-sizing: border-box;
                                    }
                                
                                    body {
                                      margin: 0;
                                      padding: 0;
                                    }
                                
                                    a[x-apple-data-detectors] {
                                      color: inherit !important;
                                      text-decoration: inherit !important;
                                    }
                                
                                    #MessageViewBody a {
                                      color: inherit;
                                      text-decoration: none;
                                    }
                                
                                    p {
                                      line-height: inherit
                                    }
                                
                                    .desktop_hide,
                                    .desktop_hide table {
                                      mso-hide: all;
                                      display: none;
                                      max-height: 0px;
                                      overflow: hidden;
                                    }
                                
                                    .image_block img+div {
                                      display: none;
                                    }
                                
                                    @media (max-width:660px) {
                                      .desktop_hide table.icons-inner {
                                        display: inline-block !important;
                                      }
                                
                                      .icons-inner {
                                        text-align: center;
                                      }
                                
                                      .icons-inner td {
                                        margin: 0 auto;
                                      }
                                
                                      .image_block img.big,
                                      .row-content {
                                        width: 100% !important;
                                      }
                                
                                      .mobile_hide {
                                        display: none;
                                      }
                                
                                      .stack .column {
                                        width: 100%;
                                        display: block;
                                      }
                                
                                      .mobile_hide {
                                        min-height: 0;
                                        max-height: 0;
                                        max-width: 0;
                                        overflow: hidden;
                                        font-size: 0px;
                                      }
                                
                                      .desktop_hide,
                                      .desktop_hide table {
                                        display: table !important;
                                        max-height: none !important;
                                      }
                                    }
                                  </style>
                                </head>
                                
                                <body style="background-color: #f6f8f8; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                                  <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f8f8;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #2b3940;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content"
                                                    role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:15px;padding-left:20px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #f0f0f0; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      <span
                                                                        style="font-size:13px;color:#8c9497;">+91
                                                                        11223 34455</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:15px;padding-right:20px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #ffffff; line-height: 1.2; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;">
                                                                    <p
                                                                      style="margin: 0; font-size: 12px; mso-line-height-alt: 14.399999999999999px;">
                                                                      locus466@gmail.com</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #2b3940;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-left:20px;padding-right:20px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 1px solid #404D53;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #2b3940;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content"
                                                    role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="empty_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad">
                                                                <div></div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="empty_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad">
                                                                <div></div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:60px;line-height:60px;font-size:1px;"> </div>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:15px;padding-left:30px;padding-right:30px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 16.8px; color: #555555; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;">
                                                                      <span
                                                                        style="font-size:30px;color:#2b3940;"><strong><span
                                                                            style="">Congratulations!</span></strong></span>
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-3" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-left:20px;padding-right:20px;padding-top:5px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                                      <span style="color:#7e8989;">Youve
                                                                        successfully Deal a property on Real
                                                                        Estate.</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <div class="spacer_block block-4"
                                                            style="height:40px;line-height:40px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="image_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-left:16px;padding-right:16px;padding-top:16px;width:100%;">
                                                                <div align="center" class="alignment"
                                                                  style="line-height:10px"><img alt="Im an image"
                                                                    class="big" src="C:/xampp/htdocs/git-main/real-Estate/admin/Img/Property_image/image (3).jpg"
                                                                    style="display: block; height: auto; border: 0; width: 608px; max-width: 100%;"
                                                                    title="Im an image" width="608" /></div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="button_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-left:40px;padding-right:10px;padding-top:40px;text-align:left;">
                                                                <div align="left" class="alignment">
                                                                  <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" style="height:35px;width:48px;v-text-anchor:middle;" arcsize="9%" stroke="false" fillcolor="#e5f7f1"><w:anchorlock/><v:textbox inset="0px,0px,0px,1px"><center style="color:#00b074; font-family:Tahoma, sans-serif; font-size:12px"><![endif]-->
                                                                  <div
                                                                    style="text-decoration:none;display:inline-block;color:#00b074;background-color:#e5f7f1;border-radius:3px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:1px;padding-bottom:2px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;font-size:12px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                                                    <span
                                                                      style="padding-left:10px;padding-right:10px;font-size:12px;display:inline-block;letter-spacing:normal;"><span
                                                                        style="font-size: 16px; margin: 0; word-break: break-word; line-height: 2; mso-line-height-alt: 32px;"><strong><span
                                                                            data-mce-style="font-size:12px;"
                                                                            style="font-size:12px;">' . $property_data['stype'] . '</span></strong></span></span>
                                                                  </div>
                                                                  <div
                                                                    style="text-decoration:none;display:inline-block;color:#00b074;background-color:#e5f7f1;border-radius:3px;width:auto;border-top:0px solid transparent;font-weight:undefined;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:1px;padding-bottom:2px;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;font-size:12px;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                                                    <span
                                                                      style="padding-left:10px;padding-right:10px;font-size:12px;display:inline-block;letter-spacing:normal;"><span
                                                                        style="font-size: 16px; margin: 0; word-break: break-word; line-height: 2; mso-line-height-alt: 32px;"><strong><span
                                                                            data-mce-style="font-size:12px;"
                                                                            style="font-size:12px;">' . $property_data['price'] . ' Only /-</span></strong></span></span>
                                                                  </div>
                                                                  <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-3" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:5px;padding-left:40px;padding-right:40px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 16px; text-align: left; mso-line-height-alt: 19.2px;">
                                                                      <span
                                                                        style="font-size:34px;color:#2b3940;"><strong>' . $property_data['bedroom'] . '
                                                                          Bedrooms ' . $property_data['ptype'] . ' </strong></span>
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-4" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-left:40px;padding-right:40px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 21px;">
                                                                      <strong><span
                                                                          style="font-size:18px;color:#2b3940;">' . $property_data['paddress'] . '</span></strong>
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-5" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:13px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; mso-line-height-alt: 21px;">
                                                                      <span style="color:#7e8989;">' . $property_data['decription'] . '</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-left:40px;padding-right:40px;padding-top:13px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; mso-line-height-alt: 21px;">
                                                                      <span style="color:#7e8989;">' . $property_data['facilities'] . '</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-6" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-left:40px;padding-right:40px;padding-top:20px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 1px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; border-right: 1px solid #E9EBEB; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['bedroom'] . ' Bedrooms</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; border-right: 1px solid #E9EBEB; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1 mobile_hide" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['kitchen'] . ' Kitchen</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-3"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1 mobile_hide" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['balcony'] . ' Balcony</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; border-right: 1px solid #E9EBEB; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['hall'] . ' Hall</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; border-right: 1px solid #E9EBEB; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1 mobile_hide" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['bathroom'] . ' Bathrooms</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-3"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 40px; padding-right: 40px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="33.333333333333336%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1 mobile_hide" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad" style="padding-bottom:10px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:10px;padding-right:10px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #7e8989; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      ' . $property_data['bhk'] . ' BHK</p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-8"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <table border="0" cellpadding="20" cellspacing="0"
                                                            class="divider_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 0px solid #E9EBEB;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-9"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:60px;line-height:60px;font-size:1px;"> </div>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:10px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                                      <span style="color:#2b3940;"><span
                                                                          style="font-size:24px;"><strong>Thank
                                                                            You
                                                                            Visiting...</strong></span></span>
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-10"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:30px;line-height:30px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-11"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:60px;line-height:60px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-12"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:70px;line-height:70px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-13"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:30px;line-height:30px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-14"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <div class="spacer_block block-1"
                                                            style="height:30px;line-height:30px;font-size:1px;"> </div>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-15"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #2b3940;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content"
                                                    role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:15px;padding-left:20px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 16.8px;">
                                                                      <span
                                                                        style="font-size:13px;color:#8c9497;">+91
                                                                        11223 34455</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:15px;padding-right:20px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: right; mso-line-height-alt: 16.8px;">
                                                                      <span
                                                                        style="font-size:13px;color:#8c9497;">locus466@gmail.com</span>
                                                                    </p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-16"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #263339;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content"
                                                    role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="empty_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad">
                                                                <div></div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                        <td class="column column-2"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="50%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="empty_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad">
                                                                <div></div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-17"
                                            role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #263339;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="divider_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:5px;padding-left:20px;padding-right:20px;padding-top:5px;">
                                                                <div align="center" class="alignment">
                                                                  <table border="0" cellpadding="0" cellspacing="0"
                                                                    role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                      <td class="divider_inner"
                                                                        style="font-size: 1px; line-height: 1px; border-top: 1px solid #404D53;">
                                                                        <span> </span></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="text_block block-2" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="padding-bottom:30px;padding-left:20px;padding-right:20px;padding-top:15px;">
                                                                <div style="font-family: sans-serif">
                                                                  <div class=""
                                                                    style="font-size: 14px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 21px; color: #555555; line-height: 1.5;">
                                                                    <p
                                                                      style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 18px;">
                                                                      <span
                                                                        style="color:#8c9497;font-size:12px;">Etiam
                                                                        quis tempus ex. Sed vitae ipsum
                                                                        suscipit, ultricies odio vitae, suscipit
                                                                        massa. Sed tempus ipsum eget diam
                                                                        aliquam maximus. Cras accumsan urna vel
                                                                        rutrum lobortis. Maecenas tristique
                                                                        purus vel ex tempor consequat. Curabitur
                                                                        dui massa, congue sed sem at, rhoncus
                                                                        imperdiet sem. Fusce ac orci fermentum,
                                                                        malesuada dolor a, cursus augue. Quisque
                                                                        porttitor sapien arcu, quis iaculis nisi
                                                                        faucibus eget. Vestibulum eu velit
                                                                        rhoncus, aliquam ante eget, tristique
                                                                        diam.</span></p>
                                                                  </div>
                                                                </div>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-18"
                                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                            <tbody>
                                              <tr>
                                                <td>
                                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 640px;"
                                                    width="640">
                                                    <tbody>
                                                      <tr>
                                                        <td class="column column-1"
                                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                          width="100%">
                                                          <table border="0" cellpadding="0" cellspacing="0"
                                                            class="icons_block block-1" role="presentation"
                                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                            width="100%">
                                                            <tr>
                                                              <td class="pad"
                                                                style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                                                                <table cellpadding="0" cellspacing="0"
                                                                  role="presentation"
                                                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                  width="100%">
                                                                  <tr>
                                                                    <td class="alignment"
                                                                      style="vertical-align: middle; text-align: center;">
                                                                      <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                                                      <!--[if !vml]><!-->
                                                                      
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table><!-- End -->
                                </body>
                                
                                </html>';
        $sendmail = SendMail($email, $sub, $msg);
        $_SESSION['alert'] = array();
                $icon = "success";
                $title = "Congratulation..";
                $text = "Your Deal Is Success...";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        header('location:../property_order.php');
        // }
      }
    }
  } elseif ($status == "Reject") {
    $queary = mysqli_query($con, "UPDATE `tblpbooking` SET `status`='Reject',`reason`=  '$reason' WHERE `bid`= '$bid'");
    if ($queary) {
      // $pid = $_GET['pid'];
      // $Status_Update = mysqli_query($con, "UPDATE `tblhouse` SET `status`='Inactive' WHERE pid = $pid");

      // if ($Status_Update) {
      $b_email = mysqli_fetch_array(mysqli_query($con, "select * from tblpbooking where bid = $bid"));
      $email = $b_email['email'];

      if ($status == "Reject") {
        $sub = "Reject";
        $msg = "Your Property Request Has Been Rejated...";
        $sendmail = SendMail($email, $sub, $msg);
        $_SESSION['alert'] = array();
                $icon = "success";
                $title = "You Are Rejected This Deal...!";
                $text = "I Hope You Got Better Deal As Soon As Possible...";
                $footer = "Help And Support";
                $link = "contact.php";
                array_push($_SESSION['alert'],$icon,$title,$text,$footer,$link);
        header('location:../property_order.php');
      }
      // }  
    }
  }
}

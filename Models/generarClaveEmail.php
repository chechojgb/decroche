<?php


use FTP\Connection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

    class generarClave{
        public function enviarNuevaClave($email){
            $f = null;


            $objConexion = new conexion();

            $conexion= $objConexion->get_conexion();

            $verificar = "SELECT * FROM users WHERE email=:email";

            $result = $conexion->prepare($verificar);

            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if($f){

                //generaramos una nueva clave a partir de un random

                $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $longitud = 8;

                $newPass = substr(str_shuffle($caracteres),0,$longitud);
                $emailFor = $f["email"];

                $claveMd = md5($newPass);
                $id = $f["id"];
                $nombre = $f["nombres"];
                $apellidos = $f["apellidos"];
                $actualizarClave = "UPDATE users SET clave =:claveMd WHERE id=:id";

                $result = $conexion->prepare($actualizarClave);

                $result->bindParam(":claveMd", $claveMd);
                $result->bindParam(":id", $id);

                $result->execute();


                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'decrochesoporte@gmail.com';                     //SMTP username
                $mail->Password   = 'geunoztwozoavfow';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                //emisor
                $mail->setFrom('decrochesoporte@gmail.com', 'SoporteDeCroche');
                //receptor
                $mail->addAddress($emailFor); 
                //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->CharSet = 'UTF-8';
                $mail->Subject = 'Recuperación de contraseña  - DeCroche';
                $mail->Body    = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="es" style="font-family:, tahoma, sans-serif">
                 <head>
                  <meta charset="UTF-8">
                  <meta content="width=device-width, initial-scale=1" name="viewport">
                  <meta name="x-apple-disable-message-reformatting">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta content="telephone=no" name="format-detection">
                  <title>Nueva plantilla 3</title><!--[if (mso 16)]>
                    <style type="text/css">
                    a {text-decoration: none;}
                    </style>
                    <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG></o:AllowPNG>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]--><!--[if !mso]><!-- -->
                  <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet"><!--<![endif]-->
                  <style type="text/css">
                #outlook a {
                    padding:0;
                }
                .es-button {
                    mso-style-priority:100!important;
                    text-decoration:none!important;
                }
                a[x-apple-data-detectors] {
                    color:inherit!important;
                    text-decoration:none!important;
                    font-size:inherit!important;
                    font-family:inherit!important;
                    font-weight:inherit!important;
                    line-height:inherit!important;
                }
                .es-desk-hidden {
                    display:none;
                    float:left;
                    overflow:hidden;
                    width:0;
                    max-height:0;
                    line-height:0;
                    mso-hide:all;
                }
                @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120% } h1 { font-size:30px!important; text-align:center } h2 { font-size:24px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important; text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:24px!important; text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important; text-align:center } .es-menu td a { font-size:12px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:18px!important; display:block!important; border-top-width:15px!important; border-right-width:0px!important; border-left-width:0px!important; border-bottom-width:15px!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
                @media screen and (max-width:384px) {.mail-message-content { width:414px!important } }
                </style>
                 </head>
                 <body style="width:100%;font-family:   tahoma, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
                  <div dir="ltr" class="es-wrapper-color" lang="es" style="background-color:#FFFFFF"><!--[if gte mso 9]>
                            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                <v:fill type="tile" color="#ffffff"></v:fill>
                            </v:background>
                        <![endif]-->
                   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF">
                     <tr>
                      <td valign="top" style="padding:0;Margin:0">
                       <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                         <tr>
                          <td align="center" style="padding:0;Margin:0">
                           <table bgcolor="#fce9ef" class="es-header-body" align="center" cellpadding="0" cellspacing="0" background="https://efngkqo.stripocdn.email/content/guids/CABINET_eed4d6b52258b04be89b290c9e935fcb/images/group_14.png" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFF2FE;background-repeat:no-repeat;width:600px;background-image:url(https://efngkqo.stripocdn.email/content/guids/CABINET_eed4d6b52258b04be89b290c9e935fcb/images/group_14.png);background-position:left center" role="none">
                             <tr>
                              <td class="es-m-p20r es-m-p20l" align="left" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px">
                               <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                 <tr>
                                  <td class="es-m-p0r" valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank" href="https://viewstripo.email"><img src="https://efngkqo.stripocdn.email/content/guids/CABINET_621729eb301b870cbfea4a78801915c95414fe8c74496ad8fd33e11a822e47fa/images/7046091ai_2.png" alt="Logo" style="display: block;" height="85" title="Logo"></a></td>
                            </tr>
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px;font-size:0">
                                       <table border="0" width="60%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                         <tr>
                                          <td style="padding:0;Margin:0;border-bottom:2px solid #666666;background:none;height:1px;width:100%;margin:0px"></td>
                                         </tr>
                                       </table></td>
                                     </tr>
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:5px;padding-bottom:10px;font-size:0">
                                       <table border="0" width="60%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                         <tr>
                                          <td style="padding:0;Margin:0;border-bottom:2px solid #666666;background:none;height:1px;width:100%;margin:0px"></td>
                                         </tr>
                                       </table></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                       <table class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600" bgcolor="#fff2fe">
                        <tbody>
                            <tr>
                                <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="560" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left" class="esd-block-text">
                                                                    <p style="font-size: 34px;">&nbsp; &nbsp;<strong><span style="font-family:-apple-system,blinkmacsystemfont,roboto,helvetica,arial,sans-serif;">&nbsp;<span style="font-size:40px;">Asignación de contraseña</span></span></strong></p>
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
                            <tr>
                                <td class="esd-structure" align="left">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="600" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://efngkqo.stripocdn.email/content/guids/CABINET_621729eb301b870cbfea4a78801915c95414fe8c74496ad8fd33e11a822e47fa/images/conejophotoroompngphotoroom.png" alt style="display: block;" width="585"></a></td>
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
                    </table>
                       <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                         <tr>
                          <td align="center" style="padding:0;Margin:0">
                           <table bgcolor="#B2E0B0" class="es-content-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#fff2fe;width:600px">
                             <tr>
                              <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                               <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                 <tr>
                                  <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                     <td align="center" class="esd-block-text es-p10t es-p20b">
                                     <h1><strong>Hola '.$nombre.' '.$apellidos.'</strong></h1>
                                 </td>
                                    
                                     </tr>
                                     <tr>
                                     <td align="center" class="es-m-p0r es-m-p0l" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:40px;padding-right:40px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:   tahoma, sans-serif;line-height:24px;color:#333333;font-size:30px">Esta sera tu nueva contraseña</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:   tahoma, sans-serif;line-height:24px;color:#333333;font-size:16px"><br></p></td>
                                     </tr>
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:25px"><span class="es-button-border" style="border-style:solid;border-color:#2CB543;background:#e08eb1;border-width:0px;display:inline-block;border-radius:5px;width:auto"><p class="es-button es-button-1643730624775" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:20px;padding:15px 35px;display:inline-block;background:#e08eb1;border-radius:5px;font-family:arial,  helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center;mso-padding-alt:0;mso-border-alt:10px solid #fff2fe"><!--[if !mso]><!-- --><!--<![endif]-->'.$newPass.' </p></span></td>
                                     </tr>
                                     <tr>
                                      <td align="center" class="esd-block-text es-p10t es-p20b">
                                        <h1><strong>Por favor cambia tu contraseña lo más pronto posible!</strong></h1>
                                    </td>
                                   </table></td>
                                 </tr>
                               </table></td>
                             </tr>
                             <tr>
                              <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:25px"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:194px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" align="left" class="es-left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                 <tr class="es-mobile-hidden">
                                  <td class="es-m-p20b" align="center" valign="top" style="padding:0;Margin:0;width:174px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;display:none"></td>
                                     </tr>
                                   </table></td>
                                  <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
                                 </tr>
                               </table><!--[if mso]></td><td style="width:173px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" class="es-left" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                 <tr>
                                  <td align="left" class="es-m-p20b" style="padding:0;Margin:0;width:173px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:5px"><h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:Limelight, sans-serif;font-size:24px;font-style:normal;font-weight:normal;color:#333333"><br></h2></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table><!--[if mso]></td><td style="width:20px"></td><td style="width:173px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" class="es-right" align="right" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                 <tr class="es-mobile-hidden">
                                  <td align="left" style="padding:0;Margin:0;width:173px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;display:none"></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table><!--[if mso]></td></tr></table><![endif]--></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                       <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                         <tr>
                          <td align="center" style="padding:0;Margin:0">
                           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#B2E0B0;width:600px">
                             <tr>
                              <td align="left" bgcolor="#fff2fe" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:25px;background-color:#fdd7fa"><!--[if mso]><table style="width:560px" cellpadding="0" cellspacing="0"><tr><td style="width:194px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" align="left" class="es-left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                 <tr class="es-mobile-hidden">
                                  <td class="es-m-p20b" align="center" valign="top" style="padding:0;Margin:0;width:174px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0">
                                       <table border="0" width="60%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                         <tr>
                                          <td style="padding:0;Margin:0;border-bottom:2px solid #666666;background:none;height:1px;width:100%;margin:0px"></td>
                                         </tr>
                                       </table></td>
                                     </tr>
                                   </table></td>
                                  <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
                                 </tr>
                               </table><!--[if mso]></td><td style="width:173px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" class="es-left" align="left" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                 <tr>
                                  <td align="left" class="es-m-p20b" style="padding:0;Margin:0;width:173px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:5px"><h2 style="Margin:0;line-height:29px;mso-line-height-rule:exactly;font-family:Limelight, sans-serif;font-size:24px;font-style:normal;font-weight:normal;color:#333333">DeCroche</h2><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:   tahoma, sans-serif;line-height:24px;color:#333333;font-size:16px"><br></p></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table><!--[if mso]></td><td style="width:20px"></td><td style="width:173px" valign="top"><![endif]-->
                               <table cellpadding="0" cellspacing="0" class="es-right" align="right" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                 <tr class="es-mobile-hidden">
                                  <td align="left" style="padding:0;Margin:0;width:173px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:15px;font-size:0">
                                       <table border="0" width="60%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                         <tr>
                                          <td style="padding:0;Margin:0;border-bottom:2px solid #666666;background:none;height:1px;width:100%;margin:0px"></td>
                                         </tr>
                                       </table></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table><!--[if mso]></td></tr></table><![endif]--></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                       <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                         <tr>
                          <td align="center" style="padding:0;Margin:0">
                           <table bgcolor="#ffffff" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                             <tr>
                              <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px">
                               <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                 <tr>
                                  <td align="left" style="padding:0;Margin:0;width:560px">
                                   <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                     <tr>
                                      <td align="center" style="padding:0;Margin:0;display:none"></td>
                                     </tr>
                                   </table></td>
                                 </tr>
                               </table></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table>
                  </div>
                 </body>
                </html>
                
                ';  
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo '<script>alert("Correo enviado")</script>';
                echo '<script> location.href="../Views/extras/page-reset-password.html" </script>'; 
            } catch (Exception $e) {
                echo "ERROR: {$mail->ErrorInfo}";
            }

              //class GenerarClave{
        //public function enviarNuevaClave($identificacion, $email){

        //}
    //}


            }else{
            echo '<script>alert("Los datos enviados no son correctos, verifiquelos")</script>';
            echo '<script> location.href="../Views/extras/page-reset-password.html" </script>'; 
        }
    } 
    }


    
    




  

?>
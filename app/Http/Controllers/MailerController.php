<?php
namespace App\Http\Controllers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class MailerController extends Controller
{
    //

    public static function enviarMail($mensaje)
    {
        $contenido = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid ml-auto ">
            <div class="card" style="max-height: 500px; max-width:30%; min-width:30%" data-autohide="false">
                <div class=" card-header">
                    <div class="d-flex">
                        <div class=" justify-content-start mr-auto">
                            <strong>Notificaciones</strong>
                        </div>
                        <div class="justify-content-end ml-auto">
                            <h6 class="text-secondary">Se ha editado la factura con el codigo <b>' . $mensaje . '</b></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-auto m-0 p-0">

        </div>
        </div>
</body>
</html>
        ';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'pruebadevs2022@gmail.com';                     //SMTP username
            $mail->Password = 'prueba.2022';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('pruebadevs2022@gmail.com', 'Mailer');
            $mail->addAddress('analista3.guma@gmail.com', 'Joe User');     //Add a recipient

            $mail->addReplyTo('pruebadevs2022@gmail.com', 'Information');
            //$mail->addCC('analista.guma@gmail.com');
            //$mail->addBCC('analista2.guma@gmail.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Prueba de correo Laravel';
            $mail->Body = $contenido;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}

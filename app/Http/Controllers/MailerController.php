<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'App/Email.php';

class MailerController extends Controller
{
    //
    public function index()
    {
        return view("email");
    }

    public static function enviarMail($data)
    {
        $mail = new PHPMailer(true);
        try
        {
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
            //$mail->addCC('');
            //$mail->addBCC('');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Prueba de correo Laravel';
            //$mail->Body = view('email', ['data' => $mensaje])->render();

            $email_template = 'App/Email.php';
            $message = file_get_contents($email_template);
            $message = str_replace('%data%', $data, $message);
            $mail->Body = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }


}

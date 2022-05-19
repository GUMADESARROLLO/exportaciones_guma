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
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host = 'smtp.gmail.com';                    
            $mail->SMTPAuth = true;                                   
            $mail->Username = 'pruebadevs2022@gmail.com';                     
            $mail->Password = 'prueba.2022';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port = 465;                                    

            $mail->setFrom('pruebadevs2022@gmail.com', 'Mailer');
            $mail->addAddress('analista.guma@gmail.com', 'Joe User');     
            $mail->addReplyTo('pruebadevs2022@gmail.com', 'Information');
            //$mail->addCC('');

            $mail->isHTML(true);                                  
            $mail->Subject = 'Prueba de correo Laravel';
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

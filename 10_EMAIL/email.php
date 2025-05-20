<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'hola@dom.com';                     //SMTP username
    // $mail->Password   = '1234';                               //SMTP password //
    require 'email_access_data.php';                             // incluimos fichero con el password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('hola@dom.com', 'El que envia'); // El que envia
    $mail->addAddress('anondiaz@gmail.com', 'Andres dest');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $mail->CharSet = 'UTF-8'; // Establecer la codificación de caracteres a UTF-8
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Asunto del correo';
    $mail->Body    = 'Este es el mensaje <b>en negrita!</b>'; // Contenido HTML
    $mail->AltBody = 'Este es el mensaje'; // Contenido alternativo en texto plano
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
// require '../vendor/autoload.php';
require_once __DIR__ . "/vendor/autoload.php";

// Cargamos las variables de entorno, en este caso las de acceso al servidor de correo
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $_ENV['HOST']; // 'bewsystems-com.correoseguro.dinaserver.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['USERNAME']; //'hola@dom.com';                     //SMTP username
    $mail->Password   = $_ENV['PASSWORD']; // '1234';                               //SMTP password //
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_ENV['USERNAME'], 'El que envia'); // 'hola@dom.com', 'El que envia'); // El que envia
    $mail->addAddress($email, $usuario);     //Add a recipient
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
    $mail->Subject = 'Validación de cuenta de APP Colores';
    $mail->Body    = $body; // 'Este es el mensaje <b>en negrita!</b>'; // Contenido HTML
    $mail->AltBody = 'Necesitamos un gestor de correo con soporte HTML'; // Contenido alternativo en texto plano
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
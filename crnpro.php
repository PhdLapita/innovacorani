<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);      // Passing `true` enables exceptions

$from_name = stripslashes($_POST['name']);
$from_email = stripslashes($_POST['email']);
$from_message = stripslashes(nl2br($_POST['message']));

try {
    // //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'user@example.com';                 // SMTP username
    // $mail->Password = 'secret';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@innovacorani.com', 'Contacto');
    $mail->addAddress('glapa@bearcreekmining.com', 'Gustavo Lapa');
    $mail->addReplyTo($from_email, $from_name);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje de Innovacorani.com';
    $mail->Body    = 'Has recibido un mensaje de  <b>'.$from_name.'</b>, desde el sitio web: ';
    $mail->Body   .= '<p>'.$from_message.'</p>';

    $mail->send();
    header('Location: index.php?sent=true');

} catch (Exception $e) {
    echo 'No se pudo enviar este mensaje.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

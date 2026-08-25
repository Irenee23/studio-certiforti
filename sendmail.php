<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'studio.certiforti@gmail.com';
$mail->Password = 'vvwxeoairjuqbjxf'; // password per app
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('studio.certiforti@gmail.com', 'Studio Certiforti');
$mail->addAddress('studio.certiforti@gmail.com'); // destinatario test

$mail->Subject = 'Test invio email';
$mail->Body = 'Email di prova inviata da PHP tramite Gmail.';

if(!$mail->send()) {
    echo 'Errore nell\'invio: ' . $mail->ErrorInfo;
} else {
    echo 'Email inviata con successo!';
}

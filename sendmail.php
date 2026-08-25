<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // ABILITA IL DEBUG: Mostra la comunicazione dettagliata a schermo
    $mail->SMTPDebug = 2; 

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'studio.certiforti@gmail.com';
    
    // VERIFICA: Assicurati che non ci siano spazi vuoti dentro le virgolette
    $mail->Password   = 'vvwxeoairjuqbjxf'; 
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom('studio.certiforti@gmail.com', 'Studio Certiforti');
    $mail->addAddress('studio.certiforti@gmail.com'); 

    $mail->isHTML(false); 
    $mail->Subject = 'Test invio email';
    $mail->Body    = 'Email di prova inviata da PHP tramite Gmail.';

    $mail->send();
    echo '<br><b>Email inviata con successo!</b>';

} catch (Exception $e) {
    echo "<br><b>Errore definitivo nell'invio:</b> {$mail->ErrorInfo}";
}
?>

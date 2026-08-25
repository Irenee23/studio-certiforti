<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verifica che questi percorsi siano corretti rispetto alla posizione di questo file script
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configurazione del server SMTP di Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'studio.certiforti@gmail.com';
    $mail->Password   = 'vvwxeoairjuqbjxf'; // La tua password per app di Google
    
    // Sicurezza TLS sulla porta 587 (Standard raccomandato da Google)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // RISOLUZIONE ERRORI SSL: Disabilita il controllo dei certificati locali. 
    // Evita il blocco su XAMPP, MAMP o hosting condivisi che non riconoscono l'autorità SSL.
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Mittente e Destinatario (In questo test coincidono)
    $mail->setFrom('studio.certiforti@gmail.com', 'Studio Certiforti');
    $mail->addAddress('studio.certiforti@gmail.com'); 

    // Struttura del messaggio
    $mail->isHTML(false); 
    $mail->Subject = 'Test invio email';
    $mail->Body    = 'Email di prova inviata da PHP tramite Gmail.';

    // Invio effettivo
    $mail->send();
    echo 'Email inviata con successo!';

} catch (Exception $e) {
    // Gestione degli errori nativa di PHPMailer
    echo "Errore nell'invio: {$mail->ErrorInfo}";
}
?>

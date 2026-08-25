$mail->Username   = 'studio.certiforti@gmail.com';
$mail->Password   = 'vvwx eoai rjuq bjxf';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->setFrom('studio.certiforti@gmail.com', 'Studio Certiforti');
$mail->addAddress('tuoindirizzo@dominio.it'); // destinatario di test
$mail->Subject = 'Test invio email';
$mail->Body = 'Email di prova inviata da PHP tramite Gmail.';
if(!$mail->send()) {
    echo 'Errore nell\'invio: ' . $mail->ErrorInfo;
} else {
    echo 'Email inviata con successo!';
}


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'eduardmora88@gmail.com'; // Tu correo Gmail
    $mail->Password = 'lahj sbnv ifzd bzsa'; // Usa la contraseña de aplicación generada en Google
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('eduardmora88@gmail.com', 'Eduard');
    $mail->addAddress('faruich.hanon22049082@estu.unan.edu.ni'); // Destinatario

    $mail->Subject = "Prueba de correo con PHPMailer";
    $mail->isHTML(true);
    $mail->Body = "<h3>El que lo lea es puto.</h3>";

    if ($mail->send()) {
        echo "✅ Correo enviado correctamente!";
    } else {
        echo "❌ Error al enviar el correo.";
    }
} catch (Exception $e) {
    echo "Error al enviar el correo: " . $mail->ErrorInfo;
}
?>

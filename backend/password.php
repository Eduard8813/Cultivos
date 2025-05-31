<?php
session_start();
header('Content-Type: application/json');
require_once 'database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Habilitar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = ["success" => false, "message" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    try {
        // Verificar conexión a la base de datos
        if (!$conn) {
            throw new Exception("❌ La conexión a la base de datos no existe.");
        }

        // Preparar consulta con `mysqli`
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        
        if (!$stmt) {
            throw new Exception("❌ Error en la consulta SQL: " . $conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'eduardmora88@gmail.com'; // Cambiar a correo corporativo
                $mail->Password = 'lahj sbnv ifzd bzsa'; // Usa una contraseña segura o credenciales de aplicación
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('eduardmora88@gmail.com', 'Soporte - Rieguito');
                $mail->addAddress($email);
                $mail->Subject = "Solicitud de Restablecimiento de Contraseña";
                $mail->isHTML(true);
                $mail->Body = "<div style='position: relative; padding: 20px;'>
                                   <img src='https://bing.com/th/id/BCO.fd6dda68-9326-4821-bb61-8e8dd3d5892f.png' style='position: absolute; top: 10px; right: 10px; width: 100px;' alt='Logo'>
                                   <p>Estimado usuario,<br><br>
                                   Hemos recibido una solicitud para restablecer su contraseña. Si no ha realizado esta solicitud, ignore este mensaje.<br><br>
                                   Para continuar con el restablecimiento, haga clic en el siguiente enlace:<br><br>
                                   <a href='https://tuempresa.com/restablecer'>Restablecer contraseña</a><br><br>
                                   Atentamente,<br>
                                   <strong>Equipo de Soporte - Rieguito</strong></p>
                               </div>";

                if ($mail->send()) {
                    $response["success"] = true;
                    $response["message"] = "✅ Correo enviado exitosamente.";
                } else {
                    throw new Exception("❌ Error al enviar el correo: " . $mail->ErrorInfo);
                }
            } catch (Exception $e) {
                $response["message"] = $e->getMessage();
            }
        } else {
            $response["message"] = "❌ El correo no está registrado.";
        }
    } catch (Exception $e) {
        $response["message"] = "❌ " . $e->getMessage();
    }
}

echo json_encode($response);
?>

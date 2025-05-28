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
                $mail->Username = 'eduardmora88@gmail.com';
                $mail->Password = 'lahj sbnv ifzd bzsa';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('eduardmora88@gmail.com', 'Rieguito');
                $mail->addAddress($email);
                $mail->Subject = "Recuperacion de contrasena";
                $mail->isHTML(true);
                $mail->Body = "<p>Hola,<br><br>Haz clic en el enlace para restablecer tu contraseña:<br><br><a href='https://tu_sitio.com/restablecer'>Restablecer contraseña</a></p>";

                if ($mail->send()) {
                    $response["success"] = true;
                    $response["message"] = "✅ Correo enviado.";
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

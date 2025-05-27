<?php
require_once 'database.php'; // Conectar a la base de datos
session_start(); // Asegurar que la sesión inicia

header('Content-Type: application/json'); // Enviar respuesta JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        echo json_encode(["Respuesta" => "Por favor, ingresa ambos campos"]);
        exit;
    }

    if (!$conn) {
        echo json_encode(["Respuesta" => "Error en la conexión a la base de datos"]);
        exit;
    }

    $query = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    if (!$query) {
        echo json_encode(["Respuesta" => "Error en la preparación de la consulta"]);
        exit;
    }

    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        if (password_verify($password, $user_data['password'])) {
            // Guardar ID del usuario en la sesión
            $_SESSION['user_id'] = $user_data['id'];

            echo json_encode([
                "Respuesta" => "Login successful",
                "redirect_url" => "consulta1.php  "
            ]);
        } else {
            echo json_encode(["Respuesta" => "Contraseña incorrecta"]);
        }
    } else {
        echo json_encode(["Respuesta" => "Email no encontrado"]);
    }

    $query->close();
    $conn->close();
}
?>
    
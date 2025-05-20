<?php
require_once 'database.php'; // Asegúrate de que este archivo configura correctamente la conexión

header('Content-Type: application/json'); // Define la respuesta como JSON
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Validación de entrada
    if (empty($email) || empty($password)) {
        echo json_encode(["Respuesta" => "Por favor, ingresa ambos campos"]);
        exit;
    }

    // Consulta segura a la base de datos utilizando prepared statements
    $query = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        
        // Verificación de contraseña
        if (password_verify($password, $user_data['password'])) {
            session_start();
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['id'];

            echo json_encode(["Respuesta" => "Login successful"]);
            exit;
        } else {
            echo json_encode(["Respuesta" => "Contraseña incorrecta"]);
            exit;
        }
    } else {
        echo json_encode(["Respuesta" => "Email no encontrado"]);
        exit;
    }
} else {
    echo json_encode(["Respuesta" => "Método no permitido"]);
    exit;
}
?>

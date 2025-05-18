<?php
require_once 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['correo'];
    $password = $_POST['contrasena'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo json_encode(["Respuesta"=> "Please fill in all fields"]);
        exit;
    }

    // Query database
    $query = "SELECT * FROM users WHERE email = '$correo'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            // Login successful, start session
            session_start();
            $_SESSION['email'] = $correo;
            $_SESSION['user_id'] = $user_data['id']; // Store the user ID in the session

            echo json_encode(["Respuesta" => "Login successful"]);
            return;
        } else {
            echo json_encode(["Respuesta" => "Invalid password"]);
            return;
        }
    } else {
        echo json_encode(["Respuesta" => "Username not found"]);
        return;
    }
}

?>
<?php
require_once 'database.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar conexión con la base de datos
    if (!$conn) {
        die(json_encode(["Respuesta" => "Error en la conexión a la base de datos: " . $conn->connect_error]));
    }

    // Capturar datos enviados desde el formulario
    $correo = $_POST['correo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $fecha_nacimiento = $_POST['fecha'] ?? '';
    $zona = $_POST['zona'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validar que los campos no estén vacíos
    if (empty($correo) || empty($nombre) || empty($apellido) || empty($fecha_nacimiento) || empty($zona) || empty($telefono) || empty($contrasena)) {
        echo json_encode(["Respuesta" => "Por favor, completa todos los campos"]);
        exit;
    }

    // Verificar si el correo ya está registrado
    $query = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    
    if (!$stmt) {
        die(json_encode(["Respuesta" => "Error en la preparación de la consulta SELECT: " . $conn->error]));
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["Respuesta" => "El correo electrónico ya está registrado"]);
        exit;
    }

    // Hash de la contraseña
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $query = "INSERT INTO users (email, first_name, last_name, fecha_de_nacimiento, password, phone, zona) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die(json_encode(["Respuesta" => "Error en la preparación de la consulta INSERT: " . $conn->error]));
    }

    // Asociar los parámetros correctamente
    $stmt->bind_param("sssssss", $correo, $nombre, $apellido, $fecha_nacimiento, $hashed_password, $telefono, $zona);

    // Ejecutar la consulta y verificar que los datos se inserten correctamente
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["Respuesta" => "Registro exitoso"]);
        } else {
            echo json_encode(["Respuesta" => "La consulta se ejecutó pero no se insertaron datos"]);
        }
    } else {
        echo json_encode(["Respuesta" => "Error en el registro: " . $stmt->error]);
    }

    // Cerrar la consulta y liberar recursos
    $stmt->close();
    $conn->close();
}
?>

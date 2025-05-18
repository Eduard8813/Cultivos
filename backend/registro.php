<?php
require_once 'database.php'; // Incluir la configuración de la base de datos

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y sanitizar los datos del formulario
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $apellido = $conn->real_escape_string(trim($_POST['apellido']));
    $fecha_nacimiento = $conn->real_escape_string(trim($_POST['fecha']));
    $zona = $conn->real_escape_string(trim($_POST['zona']));
    $telefono = $conn->real_escape_string(trim($_POST['telefono']));
    $correo = $conn->real_escape_string(trim($_POST['correo']));
    $contrasena = password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT); // Hash de la contraseña

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, zona, telefono, correo, contrasena) 
            VALUES ('$nombre', '$apellido', '$fecha_nacimiento', '$zona', '$telefono', '$correo', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>

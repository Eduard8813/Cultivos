<?php
require_once 'database.php'; // Conectar a la base de datos

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["Respuesta" => "Conexión fallida: " . $conn->connect_error]));
}

// Obtener los parámetros enviados
if (isset($_GET['temp']) && isset($_GET['hum'])) {
    $temp = filter_var($_GET['temp'], FILTER_VALIDATE_FLOAT);
    $hum = filter_var($_GET['hum'], FILTER_VALIDATE_FLOAT);

    // Verificar que los valores sean válidos
    if ($temp === false || $hum === false) {
        echo json_encode(["Respuesta" => "Valores de temperatura o humedad no válidos"]);
        exit;
    }

    // Preparar la consulta para actualizar todos los registros
    $stmt = $conn->prepare("UPDATE users SET temperature = ?, humidity = ?");
    
    if (!$stmt) {
        die(json_encode(["Respuesta" => "Error en la preparación de la consulta SQL: " . $conn->error]));
    }

    $stmt->bind_param("dd", $temp, $hum);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode(["Respuesta" => "Datos actualizados correctamente en " . $stmt->affected_rows . " registros"]);
    } else {
        echo json_encode(["Respuesta" => "No se pudo actualizar ningún registro o los datos son iguales"]);
    }

    $stmt->close();
} else {
    // Registro de depuración
    error_log("Faltan parámetros de entrada: " . json_encode($_GET));
    echo json_encode(["Respuesta" => "Faltan parámetros de entrada"]);
}

$conn->close();
?>

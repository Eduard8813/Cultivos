<?php
session_start(); // Asegurar que la sesión se mantiene

header('Content-Type: application/json');
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!$conn) {
        echo json_encode(["Respuesta" => "Error en la conexión: " . mysqli_connect_error()]);
        exit;
    }

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["Respuesta" => "Usuario no autenticado"]);
        exit;
    }

    $id = $_SESSION['user_id']; // Usar la ID del usuario autenticado
    $ciudad = trim($_POST['ciudad'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $area = trim($_POST['area'] ?? '');

    if (empty($ciudad) || empty($region) || empty($area)) {
        echo json_encode(["Respuesta" => "Completa todos los campos"]);
        exit;
    }

    // Verificar si el usuario ya tiene datos en la tabla
    $checkQuery = "SELECT id FROM users WHERE id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("i", $id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Si el usuario ya existe, actualizar los datos
        $query = "UPDATE users SET ciudad = ?, region = ?, area = ? WHERE id = ?";
    } else {
        // Si el usuario no existe, insertar los datos (sin insertar manualmente el ID)
        $query = "INSERT INTO users (ciudad, region, area) VALUES (?, ?, ?)";
    }

    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["Respuesta" => "Error en la consulta: " . $conn->error]);
        exit;
    }

    if ($checkResult->num_rows > 0) {
        $stmt->bind_param("sssi", $ciudad, $region, $area, $id);
    } else {
        $stmt->bind_param("sss", $ciudad, $region, $area);
    }

    if ($stmt->execute()) {
        echo json_encode([
            "Respuesta" => "Datos guardados correctamente",
            "Datos enviados" => ["user_id" => $id, "ciudad" => $ciudad, "region" => $region, "area" => $area]
        ]);
    } else {
        echo json_encode(["Respuesta" => "Error al registrar: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>

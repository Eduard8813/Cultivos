<?php
session_start();
require_once 'database.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!$conn) {
        die(json_encode(["Respuesta" => "Error en la conexión: " . mysqli_connect_error()]));
    }

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["Respuesta" => "Usuario no autenticado"]);
        exit;
    }

    $ciudad = trim($_POST['ciudad'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $area = trim($_POST['area'] ?? '');

    if (empty($ciudad) || empty($region) || empty($area)) {
        echo json_encode(["Respuesta" => "Completa todos los campos"]);
        exit;
    }

    $query = "INSERT INTO users (ciudad, region, area) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["Respuesta" => "Error en la consulta: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $ciudad, $region, $area);

    if ($stmt->execute()) {
        echo json_encode([
            "Respuesta" => "Datos guardados correctamente",
            "Datos enviados" => ["ciudad" => $ciudad, "region" => $region, "area" => $area]
        ]);
    } else {
        echo json_encode(["Respuesta" => "Error al registrar: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}

?>

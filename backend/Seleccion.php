<?php
require_once 'database.php'; // Conectar a la base de datos
session_start(); // Asegurar que la sesión inicia

header('Content-Type: application/json'); // Enviar respuesta JSON

// Verificar que la sesión tenga un usuario activo
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["Respuesta" => "No se encontró una sesión activa"]);
    exit;
}

$user_id = $_SESSION['user_id']; // Obtener la ID del usuario de la sesión
$cultivo = $_POST['cultivo'] ?? ''; // Obtener el nuevo cultivo desde la petición

// Validar que el cultivo no esté vacío
if (empty($cultivo)) {
    echo json_encode(["Respuesta" => "No se recibió el cultivo correctamente"]);
    exit;
}

// Conectar a la base de datos
require 'database.php'; 

if (!$conn) {
    echo json_encode(["Respuesta" => "Error en la conexión a la base de datos"]);
    exit;
}

// **Actualizar el cultivo en la base de datos**
$updateQuery = $conn->prepare("UPDATE users SET cultivo = ? WHERE id = ?");
if (!$updateQuery) {
    echo json_encode(["Respuesta" => "Error al preparar la consulta de actualización: " . $conn->error]);
    exit;
}

$updateQuery->bind_param("si", $cultivo, $user_id);

if ($updateQuery->execute()) {
    echo json_encode(["Respuesta" => "Cultivo actualizado correctamente: $cultivo"]);
} else {
    echo json_encode(["Respuesta" => "Error al actualizar el cultivo"]);
}

$updateQuery->close();
$conn->close();
?>

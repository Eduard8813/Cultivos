<?php
require_once 'database.php'; // Conectar a la base de datos

header('Content-Type: application/json'); // Enviar respuesta JSON

if (!$conn) {
    echo json_encode(["Respuesta" => "Error en la conexión a la base de datos"]);
    exit;
}

// Obtener todos los datos de temperatura y humedad
$query_data = $conn->prepare("SELECT temperature, humidity FROM users");
if (!$query_data) {
    echo json_encode(["Respuesta" => "Error en la preparación de la consulta de datos"]);
    exit;
}

$query_data->execute();
$result_data = $query_data->get_result();

$data_array = [];
while ($data = $result_data->fetch_assoc()) {
    $data_array[] = $data; // Almacenar cada fila en un array
}

if (count($data_array) > 0) {
    echo json_encode([
        "Respuesta" => "Datos recuperados exitosamente",
        "data" => $data_array // Enviar todos los datos recuperados
    ]);
} else {
    echo json_encode([
        "Respuesta" => "No se encontraron datos de temperatura y humedad"
    ]);
}

$query_data->close();
$conn->close();
?>

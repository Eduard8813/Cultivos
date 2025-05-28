<?php
require_once 'database.php';
session_start();

header('Content-Type: application/json'); // Asegurar salida JSON

// ✅ 1. Recibir email y contraseña desde el formulario
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (!$conn) {
    echo json_encode(["error" => "Error en la conexión a la base de datos"]);
    exit;
}

// ✅ 2. Buscar usuario en la base de datos
$user_query = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$user_query->bind_param("s", $email);
$user_query->execute();
$user_result = $user_query->get_result();

if ($user_result->num_rows === 0) {
    echo json_encode(["error" => "Email no encontrado"]);
    exit;
}

$row = $user_result->fetch_assoc();

// ✅ 3. Verificar contraseña
if (!password_verify($password, $row['password'])) {
    echo json_encode(["error" => "Contraseña incorrecta"]);
    exit;
}

// ✅ 4. Guardar ID en la sesión
$_SESSION['user_id'] = $row['id'];
$user_id = $_SESSION['user_id'];

// ✅ 5. Consultar si el usuario tiene datos en ciudad, región y área
$data_query = $conn->prepare("SELECT ciudad, region, area FROM users WHERE id = ?");
$data_query->bind_param("i", $user_id);
$data_query->execute();
$data_result = $data_query->get_result();

if (!$data_result || $data_result->num_rows === 0) {
    echo json_encode(["redirect" => "../Inicio/general.php"]);
} else {
    $data_row = $data_result->fetch_assoc();
    $ciudad_valida = isset($data_row['ciudad']) && trim($data_row['ciudad']) !== '';
    $region_valida = isset($data_row['region']) && trim($data_row['region']) !== '';
    $area_valida = isset($data_row['area']) && trim($data_row['area']) !== '';

    if ($ciudad_valida && $region_valida && $area_valida) {
        echo json_encode(["redirect" => "../Inicio/lectura.php"]);
    } else {
        echo json_encode(["redirect" => "../Inicio/general.php"]);
    }
}

// ✅ 6. Eliminar sesión después de la validación
//session_unset();
//session_destroy();

// Cerrar consultas y conexión
$user_query->close();
$data_query->close();
$conn->close();
?>
    
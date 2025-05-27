<?php
require_once 'database.php'; // Conectar a la base de datos
session_start(); // Asegurar que la sesión inicia

// Verificar si hay una sesión activa
if (!isset($_SESSION['user_id'])) {
    header('Location: ../Inicio/login.php'); // Redirigir si no hay sesión
    exit;
}

$user_id = $_SESSION['user_id']; // Obtener la ID del usuario de la sesión

// Verificar conexión a la base de datos
if (!$conn) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Preparar la consulta
$data_query = $conn->prepare("SELECT ciudad, region, area FROM users WHERE id = ?");
if (!$data_query) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincular parámetros y ejecutar la consulta
$data_query->bind_param("i", $user_id);
$data_query->execute();
$data_result = $data_query->get_result();

// Verificar si hay errores en la ejecución de la consulta
if ($data_result === false) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

// Evaluar los resultados
if ($data_result->num_rows > 0) {
    // Hay datos, imprimir resultados
    echo "<h2>Resultados encontrados:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Ciudad</th><th>Región</th><th>Área</th></tr>";
    
    while ($row = $data_result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['ciudad']) . "</td>";
        echo "<td>" . htmlspecialchars($row['region']) . "</td>";
        echo "<td>" . htmlspecialchars($row['area']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    // No hay datos, redirigir a general.php
    echo "<h2>No se encontraron resultados. Redirigiendo a general.php...</h2>";
    header('Location: ../Inicio/general.php');
    exit;
}

// Cerrar la consulta y la conexión
$data_query->close();
$conn->close();
?>

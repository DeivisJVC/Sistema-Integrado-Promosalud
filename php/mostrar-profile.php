<?php 
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['numero_documento'])) {
    header("Location: ../views/inicio.php"); // Redirige al login si no está logueado
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}

// Recuperar los datos del usuario desde la base de datos
$numero_documento = $_SESSION['numero_documento'];
$sql = "SELECT nombres,apellidos, ocupacion, telefono, ciudad, direccion, correo, img
        FROM paciente 
        WHERE numero_documento = '$numero_documento'";

$result = $conn->query($sql);

// Verifica si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    $_SESSION['foto'] = $fila['img'];
    $_SESSION['nombres'] = $fila['nombres'];
    $_SESSION['apellidos'] = $fila['apellidos'];
    //$_SESSION['empresa'] = $fila['empresa'];
    $_SESSION['ocupacion'] = $fila['ocupacion'];
    $_SESSION['telefono'] = $fila['telefono'];
    $_SESSION['ciudad'] = $fila['ciudad'];
    $_SESSION['direccion'] = $fila['direccion'];
    $_SESSION['correo'] = $fila['correo'];
} else {
    echo "No se encontraron datos del usuario.";
    exit();
}

$conn->close();
?>
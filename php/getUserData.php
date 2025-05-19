<?php
session_start();
header("Content-Type: application/json");


if (!isset($_SESSION['numero_documento'])) {
    echo json_encode(["error" => "Usuario no logueado"]);
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "No se pudo conectar a la base de datos"]);
    exit();
}

// Verificar el rol del usuario
$rol = $_SESSION['rol'] ?? "No definido";
$numero_documento = $_SESSION['numero_documento'];

if ($rol == "paciente") {
    $sql = "SELECT nombres, apellidos, ocupacion, telefono, ciudad, direccion, correo, img FROM paciente WHERE numero_documento = ?";
} else if ($rol == "empresa") {
    $sql = "SELECT rut, nombre, telefono, direccion, ciudad, sector, correo, estado, img FROM empresa WHERE rut = ?";
} else if ($rol == "administrador") {
    $sql = "SELECT nombres, telefono, cargo, correo, img FROM usuarios_administrativos WHERE numero_documento = ?";
} else {
    echo json_encode(["error" => "Rol no válido"]);
    exit();
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $numero_documento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $datosUsuario = $result->fetch_assoc();
    echo json_encode($datosUsuario);
} else {
    echo json_encode(["error" => "No se encontraron datos"]);
}

$conn->close();
exit(); // Asegúrate de salir después de enviar la respuesta JSON
?>
<?php
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['numero_documento'])) {
  header("Location: ../views/inicio.php"); // Redirige al login si no está logueado
  exit();
}

// Recuperar el rol del usuario desde la sesión
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'No definido';

// Mostrar el rol
echo "Rol del usuario: " . $rol;

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}

if ($rol == "paciente") {
  // Recuperar los datos del usuario desde la base de datos
  $numero_documento = $_SESSION['numero_documento'];
  $sql = "SELECT nombres, apellidos, ocupacion, telefono, ciudad, direccion, correo, img
            FROM paciente 
            WHERE numero_documento = ?";
} else if ($rol == "empresa") {
  // Recuperar los datos del usuario desde la base de datos
  $numero_documento = $_SESSION['numero_documento'];
  $sql = "SELECT rut, nombre, telefono, direccion, ciudad, sector, correo, estado, img
            FROM empresa 
            WHERE rut = ?";
} else {
  echo "Rol no válido.";
  exit();
}

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $numero_documento);
$stmt->execute();
$result = $stmt->get_result();

// Verifica si la consulta fue exitosa
if (!$result) {
  die("Error en la consulta SQL: " . $conn->error);
}

if ($result->num_rows > 0 && $rol == "paciente") {
  $fila = $result->fetch_assoc();
  $_SESSION['foto'] = $fila['img'];
  $_SESSION['nombres'] = isset($fila['nombres']) ? $fila['nombres'] : $fila['nombre'];
  $_SESSION['apellidos'] = isset($fila['apellidos']) ? $fila['apellidos'] : '';
  $_SESSION['ocupacion'] = isset($fila['ocupacion']) ? $fila['ocupacion'] : '';
  $_SESSION['telefono'] = $fila['telefono'];
  $_SESSION['ciudad'] = $fila['ciudad'];
  $_SESSION['direccion'] = $fila['direccion'];
  $_SESSION['correo'] = $fila['correo'];
} else if ($result->num_rows > 0 && $rol == "empresa") {
  $fila = $result->fetch_assoc();
  $_SESSION['foto'] = $fila['img'];
  $_SESSION['nombre'] = $fila['nombre'];
  $_SESSION['telefono'] = $fila['telefono'];
  $_SESSION['direccion'] = $fila['direccion'];
  $_SESSION['ciudad'] = $fila['ciudad'];
  $_SESSION['sector'] = $fila['sector'];
  $_SESSION['correo'] = $fila['correo'];
} else if($result->num_rows > 0 && $rol == "administrador") {
  $fila = $result->fetch_assoc();
  $_SESSION['foto'] = $fila['img'];
  $_SESSION['nombres'] = isset($fila['nombres']) ? $fila['nombres'] : '';
  $_SESSION['telefono'] = $fila['telefono'];
  $_SESSION['direccion'] = $fila['direccion'];
  $_SESSION['cargo'] = $fila['cargo'];
  $_SESSION['correo'] = $fila['correo'];
}else {
  echo "No se encontraron datos del usuario.";
  exit();
}

$conn->close();

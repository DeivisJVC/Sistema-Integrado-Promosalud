<?php 
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}

// Modificar la consulta para incluir primer_nombre y segundo_nombre
$sql = "SELECT * FROM paciente WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento' AND contraseña_confirmacion = '$contraseña'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc(); // Obtener los datos del usuario
    
    $_SESSION['primer_nombre'] = $fila['primer_nombre'];
    $_SESSION['segundo_nombre'] = $fila['segundo_nombre'];
    $_SESSION['primer_apellido'] = $fila['primer_apellido'];
    $_SESSION['segundo_apellido'] = $fila['segundo_apellido'];
    $_SESSION['empresa'] = $fila['empresa'];
    $_SESSION['ocupacion'] = $fila['ocupacion'];
    $_SESSION['telefono'] = $fila['telefono'];
    $_SESSION['ciudad'] = $fila['ciudad'];
    $_SESSION['direccion'] = $fila['direccion'];
    $_SESSION['correo'] = $fila['correo'];
    header("location:Menu_cita.php");
} else {
    echo "Usuario no logueado";
} 

$conn->close();
?>
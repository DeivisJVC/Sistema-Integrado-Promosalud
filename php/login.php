<?php 
session_start();
$tipo_documento = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$contraseña = $_POST['contraseña'];

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
$sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM paciente WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento' AND contraseña_confirmacion = '$contraseña'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc(); // Obtener los datos del usuario
    $_SESSION['numero_documento'] = $numero_documento;
    $_SESSION['primer_nombre'] = $fila['primer_nombre'];
    $_SESSION['segundo_nombre'] = $fila['segundo_nombre'];
    $_SESSION['primer_apellido'] = $fila['primer_apellido'];
    $_SESSION['segundo_apellido'] = $fila['segundo_apellido'];
    header("location:views/Menu_cita.php");
} else {
    echo "Usuario no logueado";
} 

$conn->close();
?>

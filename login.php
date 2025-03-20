<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

//crear un insert sencillo
if (isset($_POST['submit'])) {
  $tipo_documento = $_POST['tipo_documento'];
  $numero_documento = $_POST['numero_documento'];
  $contraseña = $_POST['contraseña'];
  
  //$nombre_empresa = $_POST['nombre_empresa'];

  $conexion = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM paciente WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento' AND contraseña = '$contraseña'";

  $result = $conexion->query($sql);
  if ($result->num_rows > 0) {
    echo "usuario logueado";
  } else {
    echo "usuario no logueado";
  }
  
}


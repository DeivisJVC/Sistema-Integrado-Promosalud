<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

//crear un insert sencillo
if (isset($_POST['submit'])) {
  $primer_nombre = $_POST['primer_nombre'];
  $segundo_nombre = $_POST['segundo_nombre'];
  $primer_apellido = $_POST['primer_apellido'];
  $segundo_apellido = $_POST['segundo_apellido'];
  $edad = $_POST['edad'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $tipo_documento = $_POST['tipo_documento'];
  $numero_documento = $_POST['numero_documento'];
  $ciudad = $_POST['ciudad'];
  $direccion = $_POST['direccion'];
  $ocupacion = $_POST['ocupacion'];
  $contraseña_confirmacion = $_POST['contraseña_confirmacion'];
  //$nombre_empresa = $_POST['nombre_empresa'];

  $conexion = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
  }
 //agregar el nombre_empresa
  $sql = "INSERT INTO paciente (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, edad, telefono, correo, tipo_documento, numero_documento, ciudad, direccion, ocupacion, contraseña_confirmacion) VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$edad', '$telefono', '$correo', '$tipo_documento', '$numero_documento', '$ciudad', '$direccion', '$ocupacion', '$contraseña_confirmacion')";

  if (mysqli_query($conexion, $sql)) {
    echo "Se ha registrado correctamente.";
  } else {
    echo"error deivis". $sql . "<br>";
  }
  mysqli_close($conexion);
}


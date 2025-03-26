<?php
// Verifica la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

$conexion = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
  }

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Realiza la consulta SQL
$sql = "SELECT * FROM empresa";
$resultado = mysqli_query($conexion, $sql);

// Verifica si la consulta fue exitosa
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}else{
  while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<option value='" . $fila['nombre'] . "'>" . $fila['nombre'] . "</option>";
                  }
}
?>
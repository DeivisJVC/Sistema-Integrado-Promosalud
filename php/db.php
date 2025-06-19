<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

// Cambiado de $conn a $conexion
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
  die("No se pudo conectar a la base de datos: " . $conexion->connect_error);
}

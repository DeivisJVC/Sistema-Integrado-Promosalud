<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}



$stmt = $conn->prepare("SELECT id, cargo, contraseña_confirmacion FROM usuarios_administrativos WHERE correo = ?");




?>
<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Depuración: Verificar conexión a la base de datos
if ($conn->connect_error) {
  error_log('Error de conexión a la base de datos: ' . $conn->connect_error);
  die('No se pudo conectar a la base de datos: ' . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  

}
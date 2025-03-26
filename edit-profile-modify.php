<?php

include 'db.php';

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$empresa = $_POST['empresa'];
$ocupacion = $_POST['ocupacion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];


$sql = "UPDATE paciente SET nombres = '$nombres', apellidos = '$apellidos', empresa = '$empresa', ocupacion = '$ocupacion', telefono = '$telefono', ciudad = '$ciudad', direccion = '$direccion', correo = '$correo' WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento' AND contraseña_confirmacion = '$contraseña'";









?>
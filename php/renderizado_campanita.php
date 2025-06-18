<?php

require_once '../php/db.php'; // Este archivo debe definir $conexion

if (!isset($conexion)) {
  die("Error: La variable \$conexion no está definida. Verifica db.php");
}

if (!isset($_SESSION['numero_documento'])) {
  return; // o puedes usar exit();
}

$numero_documento = $_SESSION['numero_documento'];

// Obtener ID del paciente
$sql = "SELECT id FROM paciente WHERE numero_documento = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $numero_documento);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  $id_paciente = $row['id'];

  // Obtener citas
  $sql_citas = "SELECT  id, fecha_cita, tipo_examen, estado FROM agenda WHERE id_paciente = ? AND leida = 0 ORDER BY fecha_cita DESC";
  $stmt_citas = $conexion->prepare($sql_citas);
  $stmt_citas->bind_param("i", $id_paciente);
  $stmt_citas->execute();
  $citas = $stmt_citas->get_result();
} else {
  $citas = false;
}

<?php
require_once '../php/db.php'; // conexion

header('Content-Type: application/json');


if (isset($_GET['fecha'])) {
  $fecha = $_GET['fecha'];

  $sql = "SELECT DATE_FORMAT(fecha_cita, '%H:%i') as hora 
          FROM agenda 
          WHERE DATE(fecha_cita) = ? AND estado = 'Pendiente'";

  $stmt = $conexion->prepare($sql);
  if (!$stmt) {
    echo json_encode(["error" => "Error en prepare: " . $conexion->error]);
    exit;
  }

  $stmt->bind_param("s", $fecha);
  $stmt->execute();
  $result = $stmt->get_result();

  $horas = [];
  while ($row = $result->fetch_assoc()) {
    $horas[] = $row['hora'];
  }

  echo json_encode($horas);

  $stmt->close();
  $conexion->close();
} else {
  echo json_encode(["error" => "Fecha no enviada"]);
}

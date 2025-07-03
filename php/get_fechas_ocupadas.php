<?php
require_once '../php/db.php';
header('Content-Type: application/json');

$sql = "SELECT DATE(fecha_cita) as fecha, COUNT(*) as total 
        FROM agenda 
        WHERE estado = 'Pendiente' 
        GROUP BY DATE(fecha_cita)";
$result = $conexion->query($sql);

$dias_ocupados = [];
while ($row = $result->fetch_assoc()) {
  if ((int)$row['total'] >= 9) { // 9 = total de franjas horarias
    $dias_ocupados[] = $row['fecha'];
  }
}

echo json_encode($dias_ocupados);


<?php
require_once 'db.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $sql = "UPDATE agenda SET leida = 1 WHERE id = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
}
?>
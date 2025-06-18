<?php
require_once '../php/db.php'; // Ajusta la ruta según tu estructura

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id_paciente'];
  $nueva = $_POST['nueva_contraseña'];
  $confirmar = $_POST['confirmar_contraseña'];

  // Validar que coincidan
  if ($nueva !== $confirmar) {
    echo '<div class="alert alert-danger text-center mt-4">❌ Las contraseñas no coinciden.</div>';
    exit;
  }



  // Verificar si el paciente existe
  $sqlCheck = "SELECT id FROM paciente WHERE id = ?";
  $stmtCheck = $conexion->prepare($sqlCheck);
  $stmtCheck->bind_param("i", $id);
  $stmtCheck->execute();
  $resultCheck = $stmtCheck->get_result();

  if ($resultCheck->num_rows === 0) {
    echo '<div class="alert alert-danger text-center mt-4">Paciente no encontrado.</div>';
    exit;
  }
  $stmtCheck->close();

  // Hashear la contraseña (opcional pero recomendado)
  $hash = password_hash($nueva, PASSWORD_DEFAULT);

  // Actualizar contraseña
  $sqlUpdate = "UPDATE paciente SET contraseña_confirmacion = ? WHERE id = ?";
  $stmtUpdate = $conexion->prepare($sqlUpdate);
  $stmtUpdate->bind_param("si", $hash, $id);

  if ($stmtUpdate->execute()) {
    header("Location:../views/inicio.php");
    exit;
  } else {
    echo '<div class="alert alert-danger text-center mt-4">❌ Error al actualizar la contraseña.</div>';
  }

  $stmtUpdate->close();
  $conexion->close();
}
?>
<?php
require_once '../php/db.php'; // Asegúrate que la ruta es correcta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id_paciente'];
  $tipo = $_POST['tipo_usuario'];
  $nueva = $_POST['nueva_contraseña'];
  $confirmar = $_POST['confirmar_contraseña'];

  // Validación básica
  if ($nueva !== $confirmar) {
    echo '<div class="alert alert-danger text-center mt-4">❌ Las contraseñas no coinciden.</div>';
    exit;
  }

  // Definir la tabla y campo de contraseña según tipo
  switch ($tipo) {
    case 'paciente':
      $tabla = 'paciente';
      $campo = 'contraseña_confirmacion';
      break;
    case 'usuarios_administrativos':
      $tabla = 'usuarios_administrativos';
      $campo = 'contraseña_confirmacion';
      break;
    case 'empresa':
      $tabla = 'empresa';
      $campo = 'contraseña_confirmacion';
      break;
    default:
      echo '<div class="alert alert-danger text-center mt-4">❌ Tipo de usuario no válido.</div>';
      exit;
  }
  // Verificar si el usuario existe
  $sqlCheck = "SELECT id FROM $tabla WHERE id = ?";
  $stmtCheck = $conexion->prepare($sqlCheck);
  $stmtCheck->bind_param("i", $id);
  $stmtCheck->execute();
  $resultCheck = $stmtCheck->get_result();

  if ($resultCheck->num_rows === 0) {
    echo '<div class="alert alert-danger text-center mt-4">❌ Usuario no encontrado en la tabla "' . $tabla . '".</div>';
    exit;
  }
  $stmtCheck->close();

  // Actualizar la contraseña
  $sqlUpdate = "UPDATE $tabla SET $campo = ? WHERE id = ?";
  $stmtUpdate = $conexion->prepare($sqlUpdate);
  $stmtUpdate->bind_param("si", $nueva, $id);

  if ($stmtUpdate->execute()) {
    header("Location: ../views/inicio.php");
    exit;
  } else {
    echo '<div class="alert alert-danger text-center mt-4">❌ Error al actualizar la contraseña.</div>';
  }

  $stmtUpdate->close();
  $conexion->close();
}

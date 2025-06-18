<?php
require_once '../php/db.php';

$paciente = null;
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {
  $documento = $_POST['numero_documento'];

  // Buscar paciente por documento
  $sql = "SELECT id, nombres FROM paciente WHERE numero_documento = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("s", $documento);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    $paciente = $resultado->fetch_assoc(); // contiene id y nombre
  } else {
    $error = "Paciente no encontrado.";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar Contraseña</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Buscar paciente -->
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-primary text-white text-center">
            <h4>Ingrese su Numero de Documento</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="">
              <div class="mb-3">
                <label for="numero_documento" class="form-label">Número de Documento</label>
                <input type="text" class="form-control" name="numero_documento" id="numero_documento" required>
              </div>
              <div class="d-grid">
                <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
              </div>
            </form>

            <?php if ($error): ?>
              <div class="alert alert-danger mt-3 text-center"><?= $error ?></div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Mostrar formulario si el paciente fue encontrado -->
        <?php if ($paciente): ?>
          <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
              <h5>Actualizar Contraseña de <?= htmlspecialchars($paciente['nombres']) ?></h5>
            </div>
            <div class="card-body">
              <form id="formPassword" action="../php/actualizacion_contraseña.php" method="POST">
                <input type="hidden" name="id_paciente" value="<?= $paciente['id'] ?>">

                <div class="mb-3">
                  <label for="nueva_contraseña" class="form-label">Nueva Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="nueva_contraseña" name="nueva_contraseña" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('nueva_contraseña', this)">
                      <i class="bi bi-eye-slash"></i>
                    </button>
                  </div>
                </div>


                <div class="mb-3">
                  <label for="confirmar_contraseña" class="form-label">Confirmar Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="confirmar_contraseña" name="confirmar_contraseña" required>
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmar_contraseña', this)">
                      <i class="bi bi-eye-slash"></i>
                    </button>
                  </div>
                </div>


                <!-- Botón abre modal -->
                <div class="d-grid">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    Actualizar Contraseña
                  </button>
                </div>
              </form>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Modal de confirmación -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="confirmModalLabel">Confirmar actualización</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas actualizar la contraseña de este paciente?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="document.getElementById('formPassword').submit();">
            Sí, actualizar
          </button>
        </div>
      </div>
      
    </div>
  </div>
  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script>
    function togglePassword(inputId, btn) {
      const input = document.getElementById(inputId);
      const icon = btn.querySelector('i');

      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
      } else {
        input.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
      }
    }
  </script>


</body>

</html>
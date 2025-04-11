<?php
require_once 'php/mostrar-profile.php';
$foto = (!empty($_SESSION['foto']) && file_exists($_SESSION['foto'])) ? $_SESSION['foto'] : 'assets/assets/img/img_users/default.svg';
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil - Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
</head>

<body class="min-vh-100 bg-light">
  <!-- Header -->
  <header class="bg-primary py-3 "style="background: linear-gradient(to right, #0f3b6f, #1d72d4);">
    <div class="container d-flex justify-content-between align-items-center">
      <a href="index.html" class="text-white text-decoration-none fs-3 fw-bold">Sistema Integrado Promosalud</a>
     
    </div>
  </header>

  <!-- Edit Form -->
  <main class="container my-5">
    <div class="bg-white p-5 rounded shadow">
      <h1 class="mb-4">Editar Perfil</h1>
      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Hubo un error al actualizar el perfil.</div>
      <?php endif; ?>


      <form id="profileForm" action="php/edit-data-user.php" method="POST" enctype="multipart/form-data" >
        <div class="row mb-4">
          <!-- Profile Picture -->
          <div class="col-md-3 text-center mb-3 mb-md-0">
              <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto"
                style="width: 128px; height: 128px;">
                <img src="<?php echo $foto; ?>" class="rounded-circle border" width="200" height="160" alt="Foto de perfil">
              </div>
            <input type="file" class="form-control mt-2 d-none" id="img" name="img" accept="image/*">

            <button type="button" class="btn btn-ouline-primary mt-4 ms-3" onclick="document.getElementById('img').click()">Cambiar foto</button>
            <button type="submit" name="quitar_foto" value="1" class="btn btn-outline-secondary mt-4 ms-3">Quitar foto</button>

          </div>

          <!-- Personal Info -->
          <div class="col-md-9">
            <div class="mb-3">
              <label for="nombres" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="nombres" name="nombres"
                value="<?php echo $_SESSION['primer_nombre'] . ' ' . $_SESSION['segundo_nombre']; ?>">
            </div>
            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos"
                value="<?php echo $_SESSION['primer_apellido'] . ' ' . $_SESSION['segundo_apellido']; ?>">
            </div>
          </div>
        </div>

        <input type="hidden" name="numero_documento" value="<?php echo $_SESSION['numero_documento']; ?>">

        <div class="mb-3">
          <label for="ocupacion" class="form-label">Ocupación</label>
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $_SESSION['ocupacion']; ?>">
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>">
        </div>

        <div class="mb-3">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input class="form-control" id="ciudad" name="ciudad" type="text" value="<?php echo $_SESSION['ciudad']; ?>">
        </div>

        <div class="mb-3">
          <label for="direccion" class="form-label">Dirección</label>
          <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $_SESSION['direccion']; ?>">
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input class="form-control" id="correo" name="correo" type="email" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
        </div>

        <div class="d-flex justify-content-between pt-3">
          <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
          <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
        </div>
      </form>

    </div>
  </main>



  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/assets/js/darkmode.js"></script>
  <script src="/assets/js/year.js"></script>
      <script>
    document.getElementById('img').addEventListener('change', function (e) {
      const [file] = this.files;
      if (file) {
        const preview = document.querySelector('img.rounded-circle');
        preview.src = URL.createObjectURL(file);
      }
    });
    </script>

</body>

</html>
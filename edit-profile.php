<?php
include 'mostrar-profile.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil - Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/scss/custom.css" />
</head>

<body class="min-vh-100 bg-light">
  <!-- Header -->
  <header class="bg-primary py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <a href="index.html" class="text-white text-decoration-none fs-3 fw-bold">Sistema Integrado Promosalud</a>
      <a href="index.html" class="btn btn-outline-light">Volver</a>
    </div>
  </header>

  <!-- Edit Form -->
  <main class="container my-5">
    <div class="bg-white p-5 rounded shadow">
      <h1 class="mb-4">Editar Perfil</h1>
      <?php if (isset($_GET['success'])): ?>
         <div class="alert alert-success">Perfil actualizado correctamente.</div>
      <?php endif; ?>

      <form id="profileForm" action="edit-profile-modify.php" method="POST">
        <div class="row mb-4">
          <!-- Profile Picture -->
          <div class="col-md-3 text-center mb-3 mb-md-0">
            <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto"
              style="width: 128px; height: 128px;">
              U
            </div>
            <button type="button" class="btn btn-link mt-2">Cambiar foto</button>
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
              <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $_SESSION['primer_apellido'] . ' ' . $_SESSION['segundo_apellido']; ?>">
            </div>
          </div>
        </div>

        <!-- <div class="mb-3">
          agregar mostrar empresa
          <label for="empresa" class="form-label">Empresa</label>
          <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo $_SESSION['empresa']; ?>">
        </div> -->
         <div class="mb-3">
          <input type="text" class="form-control" id="numero_documento" name="numero_documento" hidden value="<?php echo $_SESSION['numero_documento']; ?>">
        </div>

        

        <div class="mb-3">
          <label for="ocupacion" class="form-label">Ocupacion</label>
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $_SESSION['ocupacion']; ?>">
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>">
        </div>

        <div class="mb-3">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input class="form-control" id="ciudad" name="ciudad" rows="2" type="text" value="<?php echo $_SESSION['ciudad'];?>"></input>
        </div>


        <div class="mb-3">
          <label for="direccion" class="form-label">Dirección</label>
          <input class="form-control" id="direccion" name="direccion" rows="2" type="text" value="<?php echo $_SESSION['direccion'];?>"></input>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electronico</label>
          <input class="form-control" id="correo" name="correo" rows="2" type="email" value="<?php echo $_SESSION['correo'];?>"></input>
        </div>

        <div class="d-flex justify-content-between pt-3">
          <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
          <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
        </div>
      </form>
    </div>
  </main>

  <script>
    document.getElementById("profileForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = {
        nombre: document.getElementById("nombre").value,
        apellidos: document.getElementById("apellidos").value,
        empresa: document.getElementById("empresa").value,
        cargo: document.getElementById("cargo").value,
        telefono: document.getElementById("telefono").value,
        direccion: document.getElementById("direccion").value,
      };

      console.log("Datos enviados:", formData);

      // Aquí podrías hacer una solicitud HTTP para enviar los datos al servidor.
      // Por ejemplo, usando fetch:
      /*
      fetch('/api/update-profile', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
        alert('Cambios guardados exitosamente');
        window.location.href = 'index.html';
      })
      .catch((error) => {
        console.error('Error:', error);
      });
      */

      // Simulación de éxito
      alert("Cambios guardados exitosamente");
      window.location.href = "index.html";
    });
  </script>

  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/js/darkmode.js"></script>
  <script src="/js/year.js"></script>

</html>
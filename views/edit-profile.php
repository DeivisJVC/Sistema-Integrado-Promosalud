<?php
require_once '../php/mostrar-profile.php';
$foto = (!empty($_SESSION['foto']) && file_exists($_SESSION['foto'])) ? $_SESSION['foto'] : '../assets/img/img_users/default.svg'; // Ruta por defecto si no hay foto


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil - Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/darkmode-edit-user.css" />

</head>

<body class="min-vh-100 bg-light" data-bs-theme="light">
  <!-- Header -->

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>

    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>

    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>
  <header class="text-white py-3  fixed-top mb-5 header-edit-user">
    <nav class="nav navbar-expand-lg align-items-center ">
      <ul class="nav container-fluid justify-content-start">
        <li class="nav-item">
          <a href="/views/inicio.php" class="nav-link">
            <img src="/assets/icon/logo_blanco_promosalud.svg" alt="logo_blanco_promosalud" width="280px" />
          </a>
        </li>
      </ul>
      <ul class="nav container-fluid justify-content-end gap-5">
        <li class="nav-item align-content-center">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown w-25" data-bs-theme="light">
              <button class="btn btn-link nav-link py-1 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                <svg class="bi my-1 theme-icon-active" width="16" height="16" fill="currentColor">
                  <use href="#circle-half"></use>
                </svg>
                <span class="d-lg-none ms-2">Toggle theme</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end px-1" aria-labelledby="bd-theme">
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                      <use href="#sun-fill"></use>
                    </svg>
                    Light
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                      <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="auto">
                    <svg class="bi me-2 opacity-50 theme-icon" width="16" height="16" fill="currentColor">
                      <use href="#circle-half"></use>
                    </svg>
                    Auto
                  </button>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <span class="mb-0 text-capitalize fs-5">
            <?=
            $_SESSION['nombres']

            ?>
            <?=
            $_SESSION['apellidos']
            ?>

          </span>
          <button type="button" class="btn bg-transparent position-relative">

            <img src="/assets/icon/notificacion.svg" alt="notificacion" class="h-6" />
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              5
              <span class="visually-hidden">Notificaciones</span>
            </span>
          </button>
        </li>
        <li class="nav-item me-5">
          <div class="dropdown">
            <a class="btn dropdown-toggle sin-triangulo" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
              </svg>
            </a>

            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../php/logout.php">Cerrar sesión</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Edit Form -->
  <main class="container my-5 mt-5  main-container-edit-user">
    <div class="bg-white p-5 rounded shadow">
      <h1 class="mb-4 editar-perfil-titulo">Editar Perfil</h1>
      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">Hubo un error al actualizar el perfil.</div>
      <?php endif; ?>

      <!-- Modal de éxito -->
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(to right, #0f3b6f, #1d72d4);">
              <h5 class="modal-title" id="successModalLabel">¡Éxito!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <p>¡Los datos se han actualizado exitosamente!</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>
      </div>

      <form id="profileForm" action="../php/edit-data-user.php" method="POST" enctype="multipart/form-data" id="multiStepForm" class="needs-validation" novalidate>
        <div class="row mb-4">
          <!-- Profile Picture -->
          <div class="col-md-3 text-center mt-3 mb-md-0">
            <div class="bg-secondary text-white rounded-circle d-flex justify-content-center align-items-center mx-auto mb-5 mt-3 "
              style="width: 128px; height: 128px;">
              <img src="<?php echo $foto; ?>" class="rounded-circle border" width="250" height="210" alt="Foto de perfil">
            </div>
            <input type="file" class="form-control mt-2 d-none" id="img" name="img" accept="image/*">

            <button type="button" class="btn btn-ouline-primary mt-4 ms-3 cambiar-foto " onclick="document.getElementById('img').click()">Cambiar foto</button>
            <button type="submit" name="quitar_foto" value="1" class="btn btn-outline-secondary mt-4 ms-3 quitar-foto">Quitar foto</button>

          </div>

          <!-- Personal Info -->
          <div class="col-md-9">
            <div class="mb-3">
              <label for="nombres" class="form-label">Nombres</label>
              <input type="text" class="form-control" id="nombres" name="nombres"
                value="<?php echo $_SESSION['nombres'] = $fila['nombres']; ?>">
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese sus nombre</div>
            </div>
            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos"
                value="<?php echo $_SESSION['apellidos'] = $fila['apellidos'] ?>">
            </div>
            <div class="valid-feedback">Excelente!</div>
            <div class="invalid-feedback">Por favor, ingrese sus apellidos</div>
          </div>
        </div>
        <!-- input oculta para el número de documento -->
        <input type="hidden" name="numero_documento" value="<?php echo $_SESSION['numero_documento']; ?>">

        <div class="mb-3">
          <label for="ocupacion" class="form-label">Ocupación</label>
          <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="<?php echo $_SESSION['ocupacion']; ?> " required>
          <div class="valid-feedback">Excelente!</div>
          <div class="invalid-feedback">Por favor, ingrese su ocupación</div>
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>" required>
          <div class="valid-feedback">Excelente!</div>
          <div class="invalid-feedback">Por favor, ingrese su número de teléfono</div>
        </div>

        <div class="mb-3">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input class="form-control" id="ciudad" name="ciudad" type="text" value="<?php echo $_SESSION['ciudad']; ?>" required>
          <div class="valid-feedback">Excelente!</div>
          <div class="invalid-feedback">Por favor, ingrese su ciudad</div>
        </div>

        <div class="mb-3">
          <label for="direccion" class="form-label">Dirección</label>
          <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $_SESSION['direccion']; ?>" required>
          <div class="valid-feedback">Excelente!</div>
          <div class="invalid-feedback">Por favor, ingrese su dirección</div>
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input class="form-control" id="correo" name="correo" type="email" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>" required>
          <div class="valid-feedback">Excelente!</div>
          <div class="invalid-feedback">Por favor, ingrese su correo electrónico</div>
        </div>

        <div class="d-flex justify-content-between pt-3">
          <button type="submit" class="btn btn-primary flex-grow-1 me-2">Guardar Cambios</button>
          <a href="Menu_cita.php" class="btn btn-secondary flex-grow-1 ms-2">Cancelar</a>
        </div>
      </form>

    </div>
  </main>



  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="../assets/js/darkmode.js"></script>
  <script src="../assets/js/year.js"></script>
  <script src="../assets/js/ValidacionRegistroUser.js"></script>
  <script src="../assets/js/mostrar-img-actualizacion.js"></script>
  <script src="../assets/js/validacion-actualizacion-data-user.js"></script>
  </script>

</body>

</html>
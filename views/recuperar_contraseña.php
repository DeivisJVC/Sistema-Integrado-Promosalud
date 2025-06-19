<?php
require_once '../php/db.php';

$paciente = null;
$error = "";
$tipo_usuario = ""; // <-- Agregado para mantener el valor seleccionado

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buscar'])) {
  $tipo_usuario = $_POST['tipo_usuario'];
  $documento = $_POST['numero_documento'];


  switch ($tipo_usuario) {
    case 'paciente':
      $tabla = 'paciente';
      break;
    case 'usuarios_administrativos':
      $tabla = 'usuarios_administrativos';
      break;
    case 'empresa':
      $tabla = 'empresa';
      break;
    default:
      $error = "Tipo de usuario no válido.";
      break;
  }
  
  // Buscar paciente por documento
  if ($tabla === "empresa") {
    $sql = "SELECT id, nombre FROM $tabla WHERE rut = ?";
  } else {
    $sql = "SELECT id, nombres FROM $tabla WHERE numero_documento = ?";
  }
  $stmt = $conexion->prepare($sql);
  if (!$stmt) {
    die("Error en prepare: " . $conexion->error);
  }
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
  <header id="header_registro" class="rounded fixed-top">
    <nav class="navbar navbar-expand-lg">
      <ul
        id="segundo_header"
        class="nav container-fluid justify-content-xxl-evenly">
        <li class="nav-item">
          <a href="/views/inicio.php" class="nav-link">
            <img
              src="/assets/icon/logo_blanco_promosalud.svg"
              alt="logo_blanco_promosalud"
              width="280px" />
          </a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5"
            aria-current="page"
            href="/views/inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5"
            href="/views/sobre_nosotros.php">
            Sobre nosotros
          </a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5 text-capitalize"
            href="/views/donde_estamos.php">Donde estamos</a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5"
            href="/views/contactanos.php">Contactanos</a>
        </li>
        <li class="nav-item redes-sociales">
          <a id="segundo_header" href=""><!-- Enlace a la pagina de Facebook -->
            <img
              src="/assets/icon/facebook.svg"
              alt="facebook"
              width="50"
              height="50" />
          </a>
        </li>
        <li class="nav-item redes-sociales">
          <a id="segundo_header" href="">
            <!-- Enlace a la pagina de Instagram -->
            <img
              src="/assets/icon/instagram 1.svg"
              alt="instagram"
              width="50"
              height="50" />
          </a>
        </li>
        <li class="nav-item redes-sociales">
          <!-- Enlace a la pagina de Twitter -->
          <a id="segundo_header" href=""><img
              src="/assets/icon/twitter.svg"
              alt="twitter"
              width="60"
              height="50" /></a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="container-fluid mt-5 pt-5">
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
                  <label for="tipo_usuario">Tipo de usuario</label>
                  <select class="form-select" name="tipo_usuario" id="tipo_usuario" required>
                    <option value="" disabled <?= $tipo_usuario == "" ? "selected" : "" ?>>Seleccione un tipo de usuario</option>
                    <option value="paciente" <?= $tipo_usuario == "paciente" ? "selected" : "" ?>>Paciente</option>
                    <option value="usuarios_administrativos" <?= $tipo_usuario == "usuarios_administrativos" ? "selected" : "" ?>>Usuario Administrativo</option>
                    <option value="empresa" <?= $tipo_usuario == "empresa" ? "selected" : "" ?>>Empresa</option>
                  </select>
                </div>
                <div class="mb-3 mt-3">
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
            <div class="card shadow-lg mb-5">
              <div class="card-header bg-success text-white text-center">
                <h5>
                  Actualizar Contraseña de 
                  <?= htmlspecialchars($tipo_usuario === 'empresa' ? $paciente['nombre'] : $paciente['nombres']) ?>
                </h5></h5>
              </div>
              <div class="card-body ">
                <form id="formPassword" action="../php/actualizacion_contraseña.php" method="POST">
                  <input type="hidden" name="id_paciente" value="<?= $paciente['id'] ?>">
                  <input type="hidden" name="tipo_usuario" value="<?= htmlspecialchars($tipo_usuario) ?>">
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
  </main>
  <footer class="container-fluid text-white footer-1 mt-auto mt-auto">
    <article class="footer-1 container-fluid">
      <article class="container-sm text-center text-md-start mt-4">
        <div class="row">
          <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            <img
              src="/assets/icon/logo_blanco_promosalud.svg "
              alt="Logo_promsoalud" />
            <p class="mb-4">
              Somos líderes en el Magdalena, y contamos con una red de
              prestadores de servicios a nivel regional y nacional
            </p>
            <p class="mb-4">
              <img
                src="/assets/icon/Direccion_footer.svg"
                alt="Direccion_footer" />
              Cra. 11 #18-90 Barrio Territorial, Centro Médico Pablo Garcia
              InfanteSanta Marta, Magdalena, Colombia
            </p>
            <p class="mb-4">
              <img
                src="/assets/icon/Correo_footer1.svg"
                alt="Correo_footer" />
              Pomosalud@promosalud.org
            </p>
            <p class="mb-4">
              <img
                src="/assets/icon/Telefono_footer.svg"
                alt="Telefono_footer" />
              4233421 - 4214882 - 4309810 - 4202158
            </p>
            <p class="mb-4 text-start">
              <img
                src="/assets/icon/calendario_footer.svg"
                width="40px"
                alt="calendario" />
              4233421 - 4214882 - 4309810 - 4202158 Citas: 304 219 5411
            </p>
          </section>
          <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            <h4 class="text-center">Servicios</h4>
            <nav class="navbar-nav">
              <!-- Falta crear los index de estas secciones -->
              <ul class="nav container-fluid">
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Medicina Laboral y del trabajo
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Sistema de gestion SG-SST
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Psicologia y psicometria
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Laboratorio
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Examenes Paraclinicos
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="http://promosalud.org/#/servicios"
                    target="_blank"
                    target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Telemedicina
                  </a>
                </li>
              </ul>
            </nav>
          </section>
          <section class="col-md-1 col-lg-4 col-xl-3 mx-auto mb-4">
            <h4>Cobertura Nacional</h4>
            <p>
              Somos parte de la RED DE PRESTADORES de servicios en salud
              ocupacional y a través de nuestros proveedores aliados atendemos
              a nivel regional y nacional
            </p>
            <div
              id="carouselExampleSlidesOnly"
              class="carousel slide"
              data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="/assets/img/carrusel1.png"
                    class="d-block "
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel2.png"
                    class="d-block "
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel3.png"
                    class="d-block "
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel4.png"
                    class="d-block "
                    alt="..." />
                </div>
              </div>
            </div>
          </section>
        </div>
      </article>
    </article>
    <article class="row footer-2">
      <section class="col-sm-4 col-md-6 text-center align-content-center">
        <p class="">
          Copyright © <span id="year"></span>
          Todos Los Derechos Reservados Por SistemaInegradoPromosalud.com
        </p>
      </section>
      <section class="col-sm-3 col-md-6 align-content-center">
        <nav class="navbar navbar-expand-lg py-3 justify-content-center">
          <ul class="nav">
            <li class="nav-item">
              <a href="/views/inicio.php" class="text-white nav-link text-white">Inicio</a>
            </li>
            <li>
              <a href="/views/sobre_nosotros.php" class="text-white nav-link">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="/views/donde_estamos.php" class="text-white nav-link">Donde Estamos</a>
            </li>
            <li>
              <a href="/views/contactanos.php" class="text-white nav-link">Contactanos</a>
            </li>
          </ul>
        </nav>
      </section>
    </article>
  </footer>
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
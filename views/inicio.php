<?php
session_start();
if (isset($_SESSION['numero_documento'])) {
  header("location:Menu_cita.php");
  exit();
} else {
  // Mostrar un mensaje que indique que debe iniciar sesión
  $mensaje = "Debe iniciar sesión para acceder a esta página.";
}
?>
<?php
$error = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<!-- data-bs-theme="dark" -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css">

</head>

<body>
  <!-- Modal para afirmar que debe iniciar sesion para acceder-->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Atención</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <?php echo $mensaje; ?>
        </div>
      </div>
    </div>
  </div>
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

  <header class="rounded fixed-top">
    <nav class="navbar navbar-expand-lg py-3">
      <ul class="nav container-fluid justify-content-xxl-evenly">
        <li class="nav-item">
          <!--Separar los iconos de las letras-->
          <a href="/views/Menu_cita.php" class="nav-link text-white  modal-trigger" aria-current="page">
            <img class="me-2" src="/assets/icon/icon _book.svg" alt="agendamiento de citas" width="40" height="40" />
            Agendamiento de citas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active modal-trigger" aria-current="page" href="../views/control_agenda.php">
            <img class="me-2" src="/assets/icon/icon _document_.svg" alt="agenda" width="40" height="40" /> Control de
            agenda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active modal-trigger" aria-current="page" href="../views/informes.php">
            <img class="me-2" src="/assets/icon/icon _file_.svg" alt="informes" width="40" height="40" /> Informes
          </a>
        </li>
        <li class="dropdown">
          <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="/assets/icon/menu.svg" alt="menu" width="50" height="50" />
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><a class="dropdown-item" href="#">Ayuda</a></li>

        </li>
      </ul>
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
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
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
      </li>
      </ul>
    </nav>
  </header>
  <main class="m-5">
    <section class="navbar navbar-expand-lg py-3 mt-4">
      <img src="/assets/icon/logoPromosalud-removebg-preview 2.svg" alt="logo" width="253" height="142" />
      <ul id="segundo_header" class="nav container-fluid justify-content-xxl-evenly">
        <li>
          <a id="segundo_header" class="nav-link active fs-5 " aria-current="page" href="../views/inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5 " href="../views/sobre_nosotros.php">Sobre nosotros </a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5 text-capitalize" href="../views/donde_estamos.php">Donde
            estamos</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" href="../views/contactanos.php">Contactanos</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" href=""><!-- Enlace a la pagina de Facebook -->
            <img src="/assets/icon/facebook.svg" alt="facebook" width="50" height="50" />
          </a>
        </li>
        <li>
          <a id="segundo_header" href="">
            <!-- Enlace a la pagina de Instagram -->
            <img src="/assets/icon/instagram 1.svg" alt="instagram" width="50" height="50" />
          </a>
        </li>
        <li>
          <!-- Enlace a la pagina de Twitter -->
          <a id="segundo_header" href=""><img src="/assets/icon/twitter.svg" alt="twitter" width="60" height="50" /></a>
        </li>
      </ul>
    </section>
    <section class="d-flex justify-content-center align-items-center mt-5  flex-wrap" style="gap: 200px;">
      <img src="/assets/icon/pacienteatendido.svg" alt="Paciente Atendido" class="img-fluid d-none d-md-block">
      <section id="formulario-inicio"
        class="container col-12 col-md-8 col-lg-6 row justify-content-center bg-tertiary rounded-5">
        <div class="col-12">
          <form class="p-5 p-md-5  rounded-3  text-capitalize" action="../php/login-2.php" novalidate method="POST" id="login">
            <div class="form-group mb-3">
              <label for="tipo_documento" class="form-label">Tipo de documento</label>
              <select class="form-control" id="tipo_documento" name="tipo_documento">
                <option value="" disabled selected>Selecciona el tipo de documento</option>
                <option value="cc">Cédula de ciudadanía</option>
                <option value="ce">Cédula extranjera</option>
                <option value="ptt">Permiso temporal de trabajo</option>
                <option value="rut">RUT</option>
                <option value="ti">Tarjeta de identidad</option>
                <option value="passport">Pasaporte</option>
                <option value="rc">Registro civil</option>
                <option value="cd">Carné diplomático</option>
                <option value="cnv">Certificado nacido vivo</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="numero_documento" class="form-label">Número de documento</label>
              <input type="number" class="form-control" id="numero_documento" placeholder="Ingresa el Documento" name="numero_documento">
            </div>
            <div class="form-group mb-3">
              <label for="contraseña" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="contraseña" placeholder="Ingresa la Contraseña" name="contraseña">
            </div>
            <!-- validar errores -->
            <?php if ($error === "1" ): ?>
              <p class="text-danger  mb-3">
                Los campos están vacíos. Por favor, complete todos los campos antes de continuar.
              </p>
            <?php endif; ?>
            <?php if ($error === "2" ): ?>
              <p class="text-danger  mb-3">
               Tipo de documento no valido<b> Por favor, inténtelo de nuevo.</b>
              </p>
            <?php endif; ?>
            <?php if ($error === "3" ): ?>
              <p class="text-danger  mb-3">
               Contraseña incorrecta<b> Por favor, inténtelo de nuevo.</b>
              </p>
            <?php endif; ?>
            <?php if ($error === "4" ): ?>
              <p class="text-danger  mb-3">
               Usuario no encontrado, lo invitamos a <b>registrarse</b>
              </p>
            <?php endif; ?>

            <div class="form-group d-flex mb-4 justify-content-between link-login">
              <a href="/views/recuperar_contraseña.php" class="me-4 link-olvidaste">¿Olvidaste la contraseña?</a>
              <a href="/views/registrate.php" class="mt-2 link-registrate">Registrate</a>
            </div>
            <div class="d-grid">
              <button type="submit_login" class="btn btn-primary rounded-4">Entrar</button>
            </div>
          </form>
        </div>
      </section>
    </section>
    <section>
      <?php
      $error = isset($_GET['error']) ? $_GET['error'] : null;
      ?>
    </section>
  </main>
  <article id="servicios" class="custom-opacity container-xxl text-black mt-5  rounded-5 mb-5">
    <h2 class="text-center p-4">Servicios</h2>
    <div class="row text-center m-4">
      <section class="d-grid col-12 col-md-6 col-lg-4  mb-4">
        <img src="/assets/icon/estetoscopio.svg" alt="estetoscopio" class="" />
        <h3 class="">Medicina laboral y del trabajo</h3>
        <p class="">
          Ofrecemos evaluación de riesgos laborales, exámenes médicos
          ocupacionales, programas de prevención de enfermedades laborales y
          asesoramiento sobre hábitos saludables en el trabajo.
        </p>
      </section>
      <section class="d-grid col-12 col-md-6 col-lg-4 text-center mb-4">
        <img src="/assets/icon/seguridad-en-el-trabajo 1.svg" class="mb-3" />
        <h3>Sistema de gestión ST-SST</h3>
        <p>
          Brindamos asesoría en la implementación y mantenimiento del Sistema de
          Gestión de Seguridad y Salud en el Trabajo (SG-SST), ayudando a las
          empresas a cumplir con sus obligaciones legales y a promover un entorno
          laboral seguro.
        </p>
      </section>
      <section class="d-grid col-12 col-md-6 col-lg-4 text-center mb-4">
        <img src="/assets/icon/pensando 1.svg" alt="pensamiento" class="mb-3" />
        <h3>Psicología y Psicometría</h3>
        <p>
          Evaluación psicológica, intervención en casos de estrés laboral, apoyo
          emocional y orientación en conflictos laborales, programas de bienestar
          emocional en el trabajo.
        </p>
      </section>
      <section class="d-grid col-12 col-md-6 col-lg-4 text-center mb-4">
        <img src="/assets/icon/examenes-de-salud 1.svg" alt="examenes" class="mb-3" />
        <h3>Exámenes paraclínicos</h3>
        <p>
          Ofrecemos una amplia gama de exámenes paraclínicos especializados para
          evaluar la salud y el bienestar de los trabajadores en entornos laborales.
        </p>
      </section>
      <section class="d-grid col-12 col-md-6 col-lg-4 text-center mb-4">
        <img src="/assets/icon/telemedicina 1.svg" alt="telemedicina" class="mb-3" />
        <h3>Telemedicina</h3>
        <p>
          Nuestros servicios de telemedicina incluyen consulta médica virtual,
          teleorientación, teleapoyo, telemedicina interactiva.
        </p>
      </section>
      <section class="d-grid col-12 col-md-6 col-lg-4 text-center mb-4">
        <img src="/assets/icon/microscopio 1.svg" class="mb-3" />
        <h3>Laboratorio</h3>
        <p>
          Nuestro laboratorio clínico ofrece una amplia gama de pruebas para
          evaluar la salud de los trabajadores en entornos laborales.
        </p>
      </section>
    </div>
  </article>
  <footer class="container-fluid text-white footer-1">
    <article class="footer-1 container-fluid ">
      <article class="container-sm text-center text-md-start mt-4">
        <div class="row">
          <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            <img src="/assets/icon/logo_blanco_promosalud.svg " alt="Logo_promsoalud" />
            <p class="mb-4">
              Somos líderes en el Magdalena, y contamos con una red de prestadores
              de servicios a nivel regional y nacional
            </p>
            <p class="mb-4">
              <img src="/assets/icon/Direccion_footer.svg" alt="Direccion_footer" />
              Cra. 11 #18-90 Barrio Territorial, Centro Médico Pablo Garcia
              InfanteSanta Marta, Magdalena, Colombia
            </p>
            <p class="mb-4">
              <img src="/assets/icon/Correo_footer1.svg" alt="Correo_footer" />
              Pomosalud@promosalud.org
            </p>
            <p class="mb-4">
              <img src="/assets/icon/Telefono_footer.svg" alt="Telefono_footer" />
              4233421 - 4214882 - 4309810 - 4202158
            </p>
            <p class="mb-4 text-start ">
              <img src="/assets/icon/calendario_footer.svg" width="40px" alt="calendario" />
              4233421 - 4214882 - 4309810 - 4202158
              Citas: 304 219 5411
            </p>
          </section>
          <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            <h4 class="text-center">Servicios</h4>
            <nav class="navbar-nav">
              <!-- Falta crear los index de estas secciones -->
              <ul class="nav container-fluid">
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
                    Medicina Laboral y del trabajo
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
                    Sistema de gestion SG-SST
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
                    Psicologia y psicometria
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
                    Laboratorio
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
                    Examenes Paraclinicos
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" target="_blank"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon">
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
              ocupacional y a través de nuestros proveedores aliados atendemos a
              nivel regional y nacional
            </p>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="/assets/img/carrusel1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel3.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel4.png" class="d-block w-100" alt="...">
                </div>
              </div>
            </div>
          </section>
        </div>
      </article>
    </article>
    <article class="row  footer-2 ">
      <section class="col-sm-4 col-md-6 text-center align-content-center">
        <p class="">
          Copyright © <span id="year"></span>
          Todos Los Derechos Reservados Por
          SistemaInegradoPromosalud.com
        </p>
      </section>
      <section class="col-sm-3 col-md-6 align-content-center ">
        <nav class="navbar navbar-expand-lg py-3 justify-content-center">
          <ul class="nav ">
            <li class="nav-item">
              <a href="/views/inicio.php" class="text-white nav-link text-white ">Inicio</a>
            </li>
            <li>
              <a href="/views/sobre_nosotros.php" class="text-white nav-link ">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="/views/donde_estamos.php" class="text-white nav-link ">Donde Estamos</a>
            </li>
            <li>
              <a href="/views/contactanos.php" class="text-white nav-link ">Contactanos</a>
            </li>
          </ul>
        </nav>
      </section>
    </article>
  </footer>
  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/assets/js/darkmode.js"></script>
  <script src="/assets/js/year.js"></script>
  <script>
    document.querySelectorAll(".modal-trigger").forEach((icon) => {
      icon.addEventListener("click", (e) => {
        e.preventDefault(); // Evita la redirección
        const loginModal = new bootstrap.Modal(document.getElementById("loginModal"));
        loginModal.show();
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const error = "<?php echo $error; ?>";
      if (error === "1") {
        const errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
        errorModal.show();
      }
    });
  </script>
</body>

</html>
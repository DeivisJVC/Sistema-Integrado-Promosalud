<?php
  session_start();
  if (!isset($_SESSION['numero_documento'])) {
    header("location:inicio.php");
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/scss/custom.css" />
  <link rel="stylesheet" href="/style.css">

</head>

<body>
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

  <!-- Header -->
  <header class="text-white py-3  fixed-top">
    <nav class="nav navbar-expand-lg align-items-center ">
      <ul class="nav container-fluid justify-content-start">
        <li class="nav-item">
          <a href="/inicio.html" class="nav-link">
            <img src="/icon/logo_blanco_promosalud.svg" alt="logo_blanco_promosalud" width="280px" />
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
            $_SESSION['primer_nombre']
           ?>
          <?= 
          $_SESSION['segundo_nombre']
          ?>
          <?=
           $_SESSION['primer_apellido']
          ?>
          <?=
           $_SESSION['segundo_apellido']
          ?>
            
        </span>
          <button type="button" class="btn bg-transparent position-relative">
          
            <img src="/icon/notificacion.svg" alt="notificacion" class="h-6" />
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
              <li><a class="dropdown-item" href="/edit-profile.php">Editar Perfil</a></li>
              <li><a class="dropdown-item" href="/logout.php">Cerrar sesión</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Profile Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-full-height">
      <div class="modal-content text-white profileModal">
        <div class="modal-header">
          <h2 class="fs-4 modal-title" id="profileModalLabel">Perfil</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal_profile">
          <div class="d-flex flex-column align-items-center gap-3">
            <div class="text-center w-100">

              <h3 class="fw-semibold">Nombre: John Doe</h3>
              <div class="mt-4">
                <p>Apellidos: Smith</p>
                <p>Empresa: Health Corp</p>
                <p>Cargo: Patient</p>
                <p>Teléfono: 123-456-7890</p>
                <p>Dirección: Street 123</p>
              </div>
              <a href="/edit-profile.html" class="btn btn-dark w-50 mt-3 text-white editar_button">Editar Perfil</a>
              <a href="/edit-profile.html" class="btn btn-dark w-50 mt-3 text-white editar_button">Cerrar sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Navigation Menu -->

  <!-- Main Content -->
  <main class="container my-5">
    <section class="container">
      <div class="row" id="card-container">
        <div class="col-12 col-md-6">
          <img src="/img/medico_paciente.png" class="img-fluid mt-5 pt-4" alt="Medico_atendiendo" />
        </div>
        <div class="col-12 col-md-6 container_letras_main ">
          <h2 class="fw-semibold mb-3">Contamos con los servicios médicos requeridos para trabajadores de empresas...
          </h2>
          <p class="text-muted mb-4">Para trabajadores de empresas, podrás realizarte una serie de exámenes...</p>
          <!-- Navigation Menu -->
          <nav class=" mx-auto my-5">
            <ul class="nav d-flex align-content-center gap-4">
              <li class="nav-item">
                <a class="btn_link    fs-5" href="/agendamiendo_citas.html" aria-current="page">Agendar Cita</a>
              </li>
              <li class="nav-item">
                <a class="btn_link    fs-5" aria-current="page" href="/control_agenda.html">Consultar
                  Citas</a>
              </li>
              <li class="nav-item">
                <a class="btn_link   fs-5" aria-current="page" href="/contactanos.html">Contáctanos</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
  </main>

  <!-- Novedades Services Grid -->
  <section id="Novedades" class="container my-5">
    <h2 class="fs-3 fw-semibold mb-4">Novedades</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card">
          <img src="/img/medico_revisando.png" class="card-img-top" alt="Ortopedia">
          <div class="card-body">
            <h5 class="card-title">Ortopedia</h5>
            <p class="card-text">Atiéndete con los mejores</p>

          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card">
          <img src="/img/rayosx.png" class="card-img-top" alt="Rayos X">
          <div class="card-body">
            <h5 class="card-title">Rayos X</h5>
            <p class="card-text">Atiéndete con los mejores</p>

          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card">
          <img src="/img/toma_presion.png" class="card-img-top" alt="Presión">
          <div class="card-body">
            <h5 class="card-title">Presión</h5>
            <p class="card-text">Atiéndete con los mejores</p>

          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="card">
          <img src="/img/examen_vista.png" class="card-img-top" alt="Examen de vista">
          <div class="card-body">
            <h5 class="card-title">Examen de vista</h5>
            <p class="card-text">Atiéndete con los mejores</p>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="container-fluid text-white footer-1">
    <article class="footer-1 container-fluid ">
      <article class="container-sm text-center text-md-start mt-4">
        <div class="row">
          <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
            <img src="/icon/logo_blanco_promosalud.svg " alt="Logo_promsoalud" />
            <p class="mb-4">
              Somos líderes en el Magdalena, y contamos con una red de prestadores
              de servicios a nivel regional y nacional
            </p>
            <p class="mb-4">
              <img src="/icon/Direccion_footer.svg" alt="Direccion_footer" />
              Cra. 11 #18-90 Barrio Territorial, Centro Médico Pablo Garcia
              InfanteSanta Marta, Magdalena, Colombia
            </p>
            <p class="mb-4">
              <img src="/icon/Correo_footer1.svg" alt="Correo_footer" />
              Pomosalud@promosalud.org
            </p>
            <p class="mb-4">
              <img src="/icon/Telefono_footer.svg" alt="Telefono_footer" />
              4233421 - 4214882 - 4309810 - 4202158
            </p>
            <p class="mb-4 text-start ">
              <img src="/icon/calendario_footer.svg" width="40px" alt="calendario" />
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
                    <img src="/icon/Vector.svg" alt="vector-icon">
                    Medicina Laboral y del trabajo
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/icon/Vector.svg" alt="vector-icon">
                    Sistema de gestion SG-SST
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/icon/Vector.svg" alt="vector-icon">
                    Psicologia y psicometria
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/icon/Vector.svg" alt="vector-icon">
                    Laboratorio
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/icon/Vector.svg" alt="vector-icon">
                    Examenes Paraclinicos
                  </a>
                </li>
                <li class="nav-item">
                  <a href="http://promosalud.org/#/servicios" target="_blank" class="text-white nav-link">
                    <img src="/icon/Vector.svg" alt="vector-icon">
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
                  <img src="/img/carrusel1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/img/carrusel2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/img/carrusel3.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="/img/carrusel4.png" class="d-block w-100" alt="...">
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
              <a href="inicio.html" class="text-white nav-link text-white ">Inicio</a>
            </li>
            <li>
              <a href="sobre_nosotros.html" class="text-white nav-link ">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="donde_estamos.html" class="text-white nav-link ">Donde Estamos</a>
            </li>
            <li>
              <a href="contactanos.html" class="text-white nav-link ">Contactanos</a>
            </li>
          </ul>
        </nav>
      </section>
    </article>
  </footer>
  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/js/darkmode.js"></script>
  <script src="/js/year.js"></script>
  <script src="/js/edit_user.js"></script>
</body>

</html>
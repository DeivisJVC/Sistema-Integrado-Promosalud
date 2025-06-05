

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contactanos</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
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
            href="../views/inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5"
            href="../views/sobre_nosotros.php">
            <img src="/assets/icon/" alt="" />
            Sobre nosotros
          </a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5 text-capitalize"
            href="../views/donde_estamos.php">Donde estamos</a>
        </li>
        <li class="nav-item">
          <a
            id="segundo_header"
            class="nav-link active fs-5"
            href="../views/contactanos.php">Contactanos</a>
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
  <main class="container-fluid main-contactanos mb-5">
    <div class="container main-container-edit-user">
      <div class="p-5 rounded shadow">
        <h1 class="mb-4 editar-perfil-titulo text-center">Formulario de Contacto</h1>
        <form id="contact-form" action="" method="POST" class="needs-validation" novalidate>
          <div class="row mb-4 ">
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre Completo</label>
              <input
                type="text"
                class="form-control"
                id="nombre"
                placeholder="Tu nombre completo"
                required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese su nombre completo</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="tu@dominio.com"
                required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido</div>
            </div>
          </div>
          <div class="row mb-4 ">
            <div class="col-md-6">
              <label for="telefono" class="form-label">Número de Teléfono</label>
              <input
                type="tel"
                class="form-control"
                id="telefono"
                placeholder="Tu número de teléfono"
                required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese un número de teléfono</div>
            </div>
            <div class="col-md-6">
              <label for="asunto" class="form-label">Asunto</label>
              <input
                type="text"
                class="form-control"
                id="asunto"
                placeholder="Motivo del contacto" 
                required
                />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el asunto</div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-md-12">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea
                class="form-control"
                id="mensaje"
                rows="4"
                placeholder="Escribe tu mensaje aquí"
                required></textarea>
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese su mensaje</div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </main>
  <footer class="container-fluid text-white footer-1">
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
                    href="Medicina_Laboral_y_Trabajo.html"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Medicina Laboral y del trabajo
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Sistema_Gestion.html" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Sistema de gestion SG-SST
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="Psicologia_psicometria.html"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Psicologia y psicometria
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Laboratorio.html" class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Laboratorio
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    href="Examenes_paraclinicos.html"
                    class="text-white nav-link">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Examenes Paraclinicos
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Telemedicina.html" class="text-white nav-link">
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
                    class="d-block w-100"
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel2.png"
                    class="d-block w-100"
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel3.png"
                    class="d-block w-100"
                    alt="..." />
                </div>
                <div class="carousel-item">
                  <img
                    src="/assets/img/carrusel4.png"
                    class="d-block w-100"
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
  <script src="/assets/js/darkmode.js"></script>
  <script src="/assets/js/year.js"></script>
  <script src="../assets/js/ValidacionRegistroUser.js"></script>
</body>

</html>
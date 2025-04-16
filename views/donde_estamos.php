<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donde estamos</title>
    <link rel="stylesheet" href="/assets/scss/custom.css" />
    <link rel="stylesheet" href="/css/style.css" />
  </head>

  <body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
      </symbol>

      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
          d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
        />
        <path
          d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
        />
      </symbol>

      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
          d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
        />
      </symbol>
    </svg>
    <header id="header_registro" class="rounded fixed-top">
    <nav class="navbar navbar-expand-lg">
      <ul
        id="segundo_header"
        class="nav container-fluid justify-content-xxl-evenly">
        <li class="nav-item">
          <a href="inicio.html" class="nav-link">
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
    <main
      class="container-fluid main-donde-estamos text-center justify-content-center align-items-center"
    >
      <h1 class="text-capitalize">
        ubicacion de la IPS Promosalud Salud Ocupacional
      </h1>
      <section id="location" class="container-fluid mb-5 mt-4">
        <img
          src="/assets/img/Foto_promosalud_calle.webp"
          alt="Foto de la empresa"
          class="img-fluid text-center"
        />
        <h2>Nuestra Ubicación</h2>
        <p>Encuéntranos en la siguiente dirección:</p>
        <address>
          Cra 11#18-90, Barrio Territorial, Centro Médico Pablo García Infante,
          Santa Marta
        </address>
        <div id="map" style="height: 400px; width: 100%">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3913.2829524649164!2d-74.20802452391311!3d11.240583488937794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef4f57088682109%3A0x5d85d885b094fbf1!2sCentro%20M%C3%A9dico%20Pablo%20Garc%C3%ADa%20Infante!5e0!3m2!1ses-419!2sco!4v1737146827984!5m2!1ses-419!2sco"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </section>
    </main>
    <footer class="container-fluid text-white footer-1">
      <article class="footer-1 container-fluid">
        <article class="container-sm text-center text-md-start mt-4">
          <div class="row">
            <section class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-4">
              <img
                src="/assets/icon/logo_blanco_promosalud.svg "
                alt="Logo_promsoalud"
              />
              <p class="mb-4">
                Somos líderes en el Magdalena, y contamos con una red de
                prestadores de servicios a nivel regional y nacional
              </p>
              <p class="mb-4">
                <img
                  src="/assets/icon/Direccion_footer.svg"
                  alt="Direccion_footer"
                />
                Cra. 11 #18-90 Barrio Territorial, Centro Médico Pablo Garcia
                InfanteSanta Marta, Magdalena, Colombia
              </p>
              <p class="mb-4">
                <img
                  src="/assets/icon/Correo_footer1.svg"
                  alt="Correo_footer"
                />
                Pomosalud@promosalud.org
              </p>
              <p class="mb-4">
                <img
                  src="/assets/icon/Telefono_footer.svg"
                  alt="Telefono_footer"
                />
                4233421 - 4214882 - 4309810 - 4202158
              </p>
              <p class="mb-4 text-start">
                <img
                  src="/assets/icon/calendario_footer.svg"
                  width="40px"
                  alt="calendario"
                />
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
                      class="text-white nav-link"
                    >
                      <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                      Medicina Laboral y del trabajo
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="http://promosalud.org/#/servicios"
                      target="_blank"
                      class="text-white nav-link"
                    >
                      <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                      Sistema de gestion SG-SST
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="http://promosalud.org/#/servicios"
                      target="_blank"
                      class="text-white nav-link"
                    >
                      <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                      Psicologia y psicometria
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="http://promosalud.org/#/servicios"
                      target="_blank"
                      class="text-white nav-link"
                    >
                      <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                      Laboratorio
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="http://promosalud.org/#/servicios"
                      target="_blank"
                      class="text-white nav-link"
                    >
                      <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                      Examenes Paraclinicos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      href="http://promosalud.org/#/servicios"
                      target="_blank"
                      target="_blank"
                      class="text-white nav-link"
                    >
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
                data-bs-ride="carousel"
              >
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="/assets/img/carrusel1.png"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/assets/img/carrusel2.png"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/assets/img/carrusel3.png"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="/assets/img/carrusel4.png"
                      class="d-block w-100"
                      alt="..."
                    />
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
                <a href="inicio.html" class="text-white nav-link text-white"
                  >Inicio</a
                >
              </li>
              <li>
                <a href="sobre_nosotros.html" class="text-white nav-link"
                  >Sobre Nosotros
                </a>
              </li>
              <li>
                <a href="donde_estamos.html" class="text-white nav-link"
                  >Donde Estamos</a
                >
              </li>
              <li>
                <a href="contactanos.html" class="text-white nav-link"
                  >Contactanos</a
                >
              </li>
            </ul>
          </nav>
        </section>
      </article>
    </footer>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="/assets/js/darkmode.js"></script>
    <script src="/assets/js/year.js"></script>
  </body>
</html>

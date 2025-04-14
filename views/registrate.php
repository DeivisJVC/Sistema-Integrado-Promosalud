<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de usuario</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/style_registro.css">
</head>

<body id="body_registro">
  <header id="header_registro" class="rounded fixed-top">
    <nav class="navbar navbar-expand-lg">
      <ul id="segundo_header" class="container-fluid nav justify-content-xxl-evenly">
        <li class="nav-item">
          <a href="inicio.html" class="nav-link">
            <img src="/assets/icon/logo_blanco_promosalud.svg" alt="logo_blanco_promosalud" width="280px" />
          </a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" aria-current="page" href="inicio.html">Inicio</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" href="sobre_nosotros.html">
            <img src="/assets/icon/" alt="">
            Sobre nosotros
          </a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link text-capitalize active fs-5" href="donde_estamos.html">Donde
            estamos</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" href="contactanos.html">Contactanos</a>
        </li>
        <li class="nav-item redes-sociales">
          <a id="segundo_header" href=""><!-- Enlace a la pagina de Facebook -->
            <img src="/assets/icon/facebook.svg" alt="facebook" width="50" height="50" />
          </a>
        </li>
        <li class="nav-item redes-sociales">
          <a id="segundo_header" href="">
            <!-- Enlace a la pagina de Instagram -->
            <img src="/assets/icon/instagram 1.svg" alt="instagram" width="50" height="50" />
          </a>
        </li>
        <li class="nav-item redes-sociales">
          <!-- Enlace a la pagina de Twitter -->
          <a id="segundo_header" href=""><img src="/assets/icon/twitter.svg" alt="twitter" width="60" height="50" /></a>
        </li>
      </ul>
    </nav>
  </header>
    <main class="container-sm main-registration mb-5">
          <section class="text-center mb-5 ">
            <h1 class="text-center">Registro de usuario</h1>
            <p class="text-center mt-3">
              Ingresa tus datos. Los campos marcados con asterisco son
              obligatorios.
            </p>
          </section>
      <section>
        <form action="../php/register.php" id="multiStepForm" class="needs-validation" novalidate method="POST">
          <!-- Paso 1: Información Personal -->
          <div class="step active justify-content-center align-content-center">
            <div class="row g-4 justify-content-center">
              <div class="col-md-6">
                <label for="primer_nombre" class="form-label">Primer Nombre<span style="color: red;">*</span></label>
                <input type="text" id="primer_nombre" name="primer_nombre" class="form-control" placeholder="Primer nombre" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su primer nombre.</div>
              </div>
              <div class="col-md-6">
                <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                <input type="text" id="segundo_nombre" name="segundo_nombre" class="form-control" placeholder="Segundo nombre" />
                <div class="valid-feedback">Excelente!</div>
              </div>
              <div class="col-md-6">
                <label for="primer_apellido" class="form-label">Primer Apellido<span style="color: red;">*</span></label>
                <input type="text" id="primer_apellido" name="primer_apellido" class="form-control" placeholder="Primer apellido" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su primer apellido.</div>
              </div>
              <div class="col-md-6">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" id="segundo_apellido" name="segundo_apellido" class="form-control" placeholder="Segundo apellido" />
                <div class="valid-feedback">Excelente!</div>
              </div>
              <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de documento<span style="color: red;">*</span></label>
                <select class="form-control" id="documentType" name="tipo_documento" required>
                  <option value="">Seleccione su tipo de documento</option>
                  <option value="cc">Cédula de ciudadanía</option>
                  <option value="ce">Cédula extranjera</option>
                  <option value="ptt">Permiso temporal de trabajo</option>
                  <option value="nit">NIT</option>
                  <option value="ti">Tarjeta de identidad</option>
                  <option value="passport">Pasaporte</option>
                  <option value="rc">Registro civil</option>
                  <option value="cd">Carné diplomático</option>
                  <option value="cnv">Certificado nacido vivo</option>
                </select>
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su tipo de documento.</div>
              </div>
              <div class="col-md-6">
                <label for="numero_documento" class="form-label">Número de Documento<span style="color: red;">*</span></label>
                <input type="text" id="numero_documento" name="numero_documento" class="form-control" placeholder="Número de documento" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su número de documento.</div>
              </div>
            </div>
            <div class="btn-container">
              <button type="button" class="btn btn-primary btn-step" onclick="nextStep()">Siguiente</button>
            </div>
          </div>

          <!-- Paso 2: Información de Contacto -->
          <div class="step">
            <div class="row g-4 justify-content-center">
              <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono<span style="color: red;">*</span></label>
                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su teléfono.</div>
              </div>
              <div class="col-md-6">
                <label for="correo" class="form-label">Correo Electrónico<span style="color: red;">*</span></label>
                <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo electrónico" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su correo electrónico.</div>
              </div>
              <div class="col-md-6">
                <label for="edad" class="form-label">Edad<span style="color: red;">*</span></label>
                <input type="text" id="edad" name="edad" class="form-control" placeholder="Edad" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su edad.</div>
              </div>
              <div class="col-md-6">
                <label for="ciudad" class="form-label">Ciudad<span style="color: red;">*</span></label>
                <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su ciudad.</div>
              </div>
              <div class="col-md-6">
                <label for="direccion" class="form-label">Direccion<span style="color: red;">*</span></label>
                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su direccion.</div>
              </div>
              <div class="col-md-6">
                <label for="ocupacion" class="form-label">Ocupación<span style="color: red;">*</span></label>
                <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Ocupación" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su ocupación.</div>
              </div>
            </div>
            <div class="col-md-6">
                <label for="empresa_name" class="form-label">Empresa<span style="color: red;">*</span></label>
                <select class="form-control" id="empresa_name" name="nombre_empresa">
                  <select name="empresa_name" id="empresa_name" disabled="disabled">
                    <?php include '../php/consult_company.php'; ?>
                  </select>
                </select>
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese la empresa en la que labora.</div>
              </div>
            <div class="btn-container">
              <button type="button" class="btn btn-secondary btn-step" onclick="prevStep()">Anterior</button>
              <button type="button" class="btn btn-primary btn-step" onclick="nextStep()">Siguiente</button>
            </div>
          </div>
          <!-- Paso 4: Crear Contraseña -->
          <div class="step ">

               <h4 class="text-center">Crear contraseña, <b>su usuario es su numero de documento</b></h4>
            <div class="row justify-content-center">
              <div class="col-md-4 mb-3">
                <label for="password" class="form-label">Contraseña<span style="color: red;">*</span></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
              </div>
              <div class="col-md-4 mb-3 ">
                <label for="contraseña_confirmacion" class="form-label">Confirmar Contraseña<span style="color: red;">*</span></label>
                <input type="password" id="contraseña_confirmacion" name="contraseña_confirmacion" class="form-control" placeholder="Confirmar contraseña" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">las constraseñas no coninciden </div>
                <!-- verificar que ambas contraseñas sean iguales -->
              </div>
            </div>
            <div class="btn-container">
              <button type="button" class="btn btn-secondary btn-step" onclick="prevStep()">Anterior</button>
              <button class="btn btn-primary" type="submit" name="submit">Registrarse</button>
            </div>
          </div>
        </form>
      </section>
  </main>
  <footer class="container-fluid text-white footer-1">
    <article class="container-fluid footer-1">
      <article class="container-sm text-center text-md-start mt-4">
        <div class="row">
          <section class="col-lg-4 col-md-4 col-xl-3 mb-4 mx-auto">
            <img src="/assets/icon/logo_blanco_promosalud.svg " alt="Logo_promsoalud" />
            <p class="mb-4">
              Somos líderes en el Magdalena, y contamos con una red de
              prestadores de servicios a nivel regional y nacional
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
            <p class="text-start mb-4">
              <img src="/assets/icon/calendario_footer.svg" width="40px" alt="calendario" />
              4233421 - 4214882 - 4309810 - 4202158 Citas: 304 219 5411
            </p>
          </section>
          <section class="col-lg-4 col-md-4 col-xl-3 mb-4 mx-auto">
            <h4 class="text-center">Servicios</h4>
            <nav class="navbar-nav">
              <!-- Falta crear los index de estas secciones -->
              <ul class="container-fluid nav">
                <li class="nav-item">
                  <a href="Medicina_Laboral_y_Trabajo.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Medicina Laboral y del trabajo
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Sistema_Gestion.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Sistema de gestion SG-SST
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Psicologia_psicometria.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Psicologia y psicometria
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Laboratorio.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Laboratorio
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Examenes_paraclinicos.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Examenes Paraclinicos
                  </a>
                </li>
                <li class="nav-item">
                  <a href="Telemedicina.html" class="nav-link text-white">
                    <img src="/assets/icon/Vector.svg" alt="vector-icon" />
                    Telemedicina
                  </a>
                </li>
              </ul>
            </nav>
          </section>
          <section class="col-lg-4 col-md-1 col-xl-3 mb-4 mx-auto">
            <h4>Cobertura Nacional</h4>
            <p>
              Somos parte de la RED DE PRESTADORES de servicios en salud
              ocupacional y a través de nuestros proveedores aliados atendemos
              a nivel regional y nacional
            </p>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="active carousel-item">
                  <img src="/assets/img/carrusel1.png" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel2.png" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel3.png" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="/assets/img/carrusel4.png" class="d-block w-100" alt="..." />
                </div>
              </div>
            </div>
          </section>
        </div>
      </article>
    </article>
    <article class="row footer-2">
      <section class="col-md-6 col-sm-4 align-content-center text-center">
        <p class="">
          Copyright © <span id="year"></span>
          Todos Los Derechos Reservados Por SistemaInegradoPromosalud.com
        </p>
      </section>
      <section class="col-md-6 col-sm-3 align-content-center">
        <nav class="navbar navbar-expand-lg justify-content-center py-3">
          <ul class="nav">
            <li class="nav-item">
              <a href="inicio.html" class="nav-link text-white">Inicio</a>
            </li>
            <li>
              <a href="sobre_nosotros.html" class="nav-link text-white">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="donde_estamos.html" class="nav-link text-white">Donde Estamos</a>
            </li>
            <li>
              <a href="contactanos.html" class="nav-link text-white">Contactanos</a>
            </li>
          </ul>
        </nav>
      </section>
    </article>
  </footer>

  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="/assets/js/darkmode.js"></script>
  <script src="/assets/js/year.js"></script>
  <script src="/assets/js/ValidacionRegistroUser.js"></script>
  <script src="/assets/js/validacionregistro_primera_vez.js"></script>

  
  </script>
</body>

</html>
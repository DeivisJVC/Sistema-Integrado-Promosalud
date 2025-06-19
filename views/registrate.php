<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro de usuario</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/style_registro.css">
  <style>
    .formulario {
      display: none;
    }

    .step {
      display: none;
    }

    .step.active {
      display: block;
    }
  </style>
</head>

<body id="body_registro">
  <header id="header_registro" class="rounded fixed-top">
    <nav class="navbar navbar-expand-lg">
      <ul id="segundo_header" class="container-fluid nav justify-content-xxl-evenly">
        <li class="nav-item">
          <a href="/views/inicio.php" class="nav-link">
            <img src="/assets/icon/logo_blanco_promosalud.svg" alt="logo_blanco_promosalud" width="280px" />
          </a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" aria-current="page" href="/views/inicio.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" href="/views/sobre_nosotros.php">
            <img src="/assets/icon/" alt="">
            Sobre nosotros
          </a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link text-capitalize active fs-5" href="/views/donde_estamos.php">Donde
            estamos</a>
        </li>
        <li class="nav-item">
          <a id="segundo_header" class="nav-link active fs-5" href="/views/contactanos.php">Contactanos</a>
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
    <section class="text-center mb-5 mt-3">
      <h1 class="text-center">Registro</h1>
      <h6 class="text-center mt-3">
        Ingresa tus datos. Los campos marcados con asterisco son
        obligatorios.
      </h6>
    </section>
    <div class="container mt-5">
      <!-- Contenedor del selector que luego se ocultará -->
      <div id="tipoContainer">
        <h3 class="text-center mb-4">Selecciona tu tipo de usuario</h3>
        <div class="mb-4 mt-4 w-50 mx-auto">
          <select id="tipoUsuario" class="form-select" onchange="seleccionarTipo()">
            <option value="">Seleccione una opción</option>
            <option value="paciente">Paciente</option>
            <option value="empresa">Empresa</option>
            <option value="administrador">Administrador</option>
          </select>
        </div>
      </div>

      <!-- Formulario de Paciente -->
      <div id="formPaciente" class="formulario  p-4 rounded shadow-sm">
        <h4 class="text-center"><b>Formulario de Paciente</b></h4>
        <form action="../php/register.php" method="POST" class="needs-validation" novalidate>
          <!-- Paso 1: Información Personal -->
          <div class="step active">
            <h5>Información Personal</h5>
            <div class="row g-4 justify-content-center">
              <div class="col-md-6">
                <input type="hidden" name="form_type" value="paciente" />
                <label for="nombres" class="form-label">Nombres<span style="color: red;">*</span></label>
                <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese sus nombres.</div>
              </div>
              <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos<span style="color: red;">*</span></label>
                <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese sus apellidos.</div>
              </div>
              <div class="col-md-6">
                <label for="id_empresa" class="form-label">Seleccione su empresa<span style="color: red;">*</span></label>
                <select class="form-control " id="id_empresa" name="id_empresa" required>
                  <option value="">Seleccione una empresa</option>
                  <?php include '../php/consult_company.php'; ?>
                </select>
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, seleccione una empresa.</div>
              </div>
              <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fehca de Nacimiento<span style="color: red;">*</span></label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su fecha de nacimiento.</div>
              </div>
              <div class="col-md-6">
                <label for="ocupacion" class="form-label">Ocupación<span style="color: red;">*</span></label>
                <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Ocupación" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su ocupación.</div>
              </div>
              <div class="col-md-6">
                <label for="tipo_documento" class="form-label">Tipo de documento<span style="color: red;">*</span></label>
                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                  <option value="">Seleccione su tipo de documento</option>
                  <option value="cc">Cédula de ciudadanía</option>
                  <option value="ce">Cédula extranjera</option>
                  <option value="ptt">Permiso temporal de trabajo</option>
                  <option value="nit">NIT</option>
                  <option value="ti">Tarjeta de identidad</option>
                  <option value="passport">Pasaporte</option>
                </select>
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, seleccione su tipo de documento.</div>
              </div>
              <div class="col-md-6">
                <label for="numero_documento" class="form-label">Número de Documento<span style="color: red;">*</span></label>
                <input type="text" id="numero_documento" name="numero_documento" class="form-control" placeholder="Número de documento" required />
                <input type="hidden" name="rol" value="paciente" />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su número de documento.</div>
              </div>
            </div>
            <div class="btn-container mt-3">
              <button type="button" class="btn btn-primary btn-step" onclick="nextStep(this)">Siguiente</button>
            </div>
          </div>

          <!-- Paso 2: Información de Contacto -->
          <div class="step">
            <h5>Información de Contacto</h5>
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
                <label for="ciudad" class="form-label">Ciudad<span style="color: red;">*</span></label>
                <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su ciudad.</div>
              </div>
              <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección<span style="color: red;">*</span></label>
                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su dirección.</div>
              </div>
            </div>
            <div class="btn-container mt-3">
              <button type="button" class="btn btn-secondary btn-step" onclick="prevStep(this)">Anterior</button>
              <button type="button" class="btn btn-primary btn-step" onclick="nextStep(this)">Siguiente</button>
            </div>
          </div>

          <!-- Paso 3: Crear Contraseña -->
          <div class="step">
            <h5>Crear Contraseña</h5>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <label for="password" class="form-label">Contraseña<span style="color: red;">*</span></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
              </div>
              <div class="col-md-6">
                <label for="contraseña_confirmacion" class="form-label">Confirmar Contraseña<span style="color: red;">*</span></label>
                <input type="password" id="contraseña_confirmacion" name="contraseña_confirmacion" class="form-control" placeholder="Confirmar contraseña" required />
                <div class="valid-feedback">Excelente!</div>
                <div class="invalid-feedback">Las contraseñas no coinciden.</div>
              </div>
            </div>
            <div class="btn-container mt-3">
              <button type="button" class="btn btn-secondary btn-step" onclick="prevStep(this)">Anterior</button>
              <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
          </div>
        </form>
      </div>

      <!-- Formulario de Empresa -->
      <div id="formEmpresa" class="formulario  p-4 rounded shadow-sm">
        <h4 class="text-center"><b>Formulario de Empresa</b></h4>
        <form action="../php/register.php" method="POST" class="needs-validation" novalidate>
          <div class="row g-4 justify-content-center">
            <div class="col-md-6">
              <input type="hidden" name="form_type" value="empresa" />
              <label for="rut" class="form-label">RUT<span style="color: red;">*</span></label>
              <input type="number" id="rut" name="rut" class="form-control" placeholder="RUT" required />
              <input type="text" id="rol" name="rol" class="form-control d-none" value="empresa" />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el RUT.</div>
            </div>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre de la Empresa<span style="color: red;">*</span></label>
              <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre de la empresa" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el nombre de la empresa.</div>
            </div>
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono<span style="color: red;">*</span></label>
              <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el teléfono.</div>
            </div>
            <div class="col-md-6">
              <label for="direccion" class="form-label">Dirección<span style="color: red;">*</span></label>
              <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese la dirección.</div>
            </div>
            <div class="col-md-6">
              <label for="ciudad" class="form-label">Ciudad<span style="color: red;">*</span></label>
              <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese la ciudad.</div>
            </div>
            <div class="col-md-6">
              <label for="sector" class="form-label">Sector al que se dedican<span style="color: red;">*</span></label>
              <input type="text" id="sector" name="sector" class="form-control" placeholder="Sector al que se dedican" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el sector al que se dedican.</div>
            </div>
            <div class="col-md-6">
              <label for="correo" class="form-label">Correo Electrónico<span style="color: red;">*</span></label>
              <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo electrónico" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el correo electrónico.</div>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Contraseña<span style="color: red;">*</span></label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
            </div>
            <div class="col-md-6">
              <label for="contraseña_confirmacion" class="form-label">Confirmar Contraseña<span style="color: red;">*</span></label>
              <input type="password" id="contraseña_confirmacion" name="contraseña_confirmacion" class="form-control" placeholder="Confirmar contraseña" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Las contraseñas no coinciden.</div>
            </div>
            <!-- Campo oculto para el estado -->
            <input type="hidden" id="estado" name="estado" value="true" />
          </div>
          <div class="btn-container mt-4">
            <button type="submit" class="btn btn-primary w-100">Registrar Empresa</button>
          </div>
        </form>
      </div>
      <!-- Formulario de Administrador -->
      <div id="formAdministrador" class="formulario  p-4 rounded shadow-sm">
        <h4 class="text-center"><b>Formulario de Administrador</b></h4>
        <form action="../php/register.php" method="POST" class="needs-validation" novalidate>
          <div class="row g-4 justify-content-center">
            <div class="col-md-6">
              <input type="hidden" name="form_type" value="administrador" />
              <label for="nombres" class="form-label">Nombre del Administrador<span style="color: red;">*</span></label>
              <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombre del administrador" required />
              <input type="hidden" name="rol" value="administrador" />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el nombre del administrador.</div>
            </div>
            <div class="col-md-6">
              <input type="hidden" name="form_type" value="administrador" />
              <label for="apellidos" class="form-label">Apellidos del Administrador<span style="color: red;">*</span></label>
              <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Nombre del administrador" required />
              <input type="hidden" name="rol" value="administrador" />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el apellidos del administrador.</div>
            </div>
            <div class="col-md-6">
              <label for="correo" class="form-label">Correo Electrónico<span style="color: red;">*</span></label>
              <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo electrónico" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el correo electrónico.</div>
            </div>
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono<span style="color: red;">*</span></label>
              <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese el teléfono.</div>
            </div>
            <div class="col-md-6">
              <label for="cargo" class="form-label">Seleccione su cargo en la empresa<span style="color: red;">*</span></label>
              <select class="form-control" id="cargo" name="cargo" required>
                <option value="">Seleccione su cargo</option>
                <option value="gerente">Gerente</option>
                <option value="enfermero">Enfermero</option>
                <option value="medico">Medico</option>
                <option value="psicologo">Psicólogo</option>
                <option value="bacteriologo">Bacteriologo</option>
                <option value="audiologo">Audiólogo</option>
                <option value="optometra">Optómetra</option>
              </select>
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, seleccione su cargo.</div>
            </div>
            <div class="col-md-6">
              <label for="tipo_documento" class="form-label">Tipo de documento<span style="color: red;">*</span></label>
              <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                <option value="">Seleccione su tipo de documento</option>
                <option value="cc">Cédula de ciudadanía</option>
                <option value="ce">Cédula extranjera</option>
                <option value="ptt">Permiso temporal de trabajo</option>
                <option value="passport">Pasaporte</option>
              </select>
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, seleccione su tipo de documento.</div>
            </div>
            <div class="col-md-6">
              <label for="numero_documento" class="form-label">Número de Documento<span style="color: red;">*</span></label>
              <input type="text" id="numero_documento" name="numero_documento" class="form-control" placeholder="Número de documento" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese su número de documento.</div>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Contraseña<span style="color: red;">*</span></label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Por favor, ingrese su contraseña.</div>
            </div>
            <div class="col-md-6">
              <label for="contraseña_confirmacion" class="form-label">Confirmar Contraseña<span style="color: red;">*</span></label>
              <input type="password" id="contraseña_confirmacion" name="contraseña_confirmacion" class="form-control" placeholder="Confirmar contraseña" required />
              <div class="valid-feedback">Excelente!</div>
              <div class="invalid-feedback">Las contraseñas no coinciden.</div>
            </div>
          </div>
          <div class="btn-container mt-4">
            <button type="submit" class="btn btn-primary w-100">Registrar Administrador</button>
          </div>
        </form>
      </div>
      </form>
    </div>
    </div>
    </div>
  </main>
  <footer class="container-fluid text-white footer-1 mt-auto">
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
              <a href="/views/inicio.php" class="nav-link text-white">Inicio</a>
            </li>
            <li>
              <a href="/views/sobre_nosotros.php" class="nav-link text-white">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="/views/donde_estamos.php" class="nav-link text-white">Donde Estamos</a>
            </li>
            <li>
              <a href="/views/contactanos.php" class="nav-link text-white">Contactanos</a>
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
  <script src="/assets/js/form_registro.js"></script>
  <script src="/assets/js/validar-contraseñas-iguales.js"></script>
</body>

</html>
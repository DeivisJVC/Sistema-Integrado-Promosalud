<?php
session_start();
if (!isset($_SESSION['numero_documento'])) {
  header("location:/views/inicio.php");
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Control de Agenda</title>
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
  <header class="text-white py-3 fixed-top">
    <nav class="nav navbar-expand-lg">
      <ul class="nav container-fluid justify-content-start ">
        <li class="nav-item ms-4">
          <a href="/views/inicio.php" class="nav-link">
            <img src="/assets/icon/logo_blanco_promosalud.svg" alt="logo_blanco_promosalud" width="280px" />
          </a>
        </li>
      </ul>
      <ul
        class="nav container-fluid justify-content-between align-items-center ul-second">
        <li class="nav-item">
          <!--Separar los iconos de las letras-->
          <a
            href="/views/Agendamiendo_citas.php"
            class="nav-link text-white"
            aria-current="page">
            <img
              class="me-1"
              src="/assets/icon/icon _book.svg"
              alt="agendamiento de citas"
              width="40"
              height="40" />
            Agendamiento de citas
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white active"
            aria-current="page"
            href="/views/control_agenda.php">
            <img
              class="me-1"
              src="/assets/icon/icon _document_.svg"
              alt="agenda"
              width="40"
              height="40" />
            Control de agenda
          </a>
        </li>
        <li class="nav-item">
          <a
            class="nav-link text-white active"
            aria-current="page"
            href="/views/informes.php">
            <img
              class="me-1"
              src="/assets/icon/icon _file_.svg"
              alt="informes"
              width="40"
              height="40" />
            Informes
          </a>
        </li>
      </ul>
      <ul
        class="nav container-fluid justify-content-end gap-5 align-items-center">
        <li class="nav-item align-content-center">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown w-25" data-bs-theme="light">
              <button
                class="btn btn-link nav-link py-1 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme"
                type="button"
                aria-expanded="false"
                data-bs-toggle="dropdown"
                data-bs-display="static">
                <svg
                  class="bi my-1 theme-icon-active"
                  width="16"
                  height="16"
                  fill="currentColor">
                  <use href="#circle-half"></use>
                </svg>
                <span class="d-lg-none ms-2">Toggle theme</span>
              </button>
              <ul
                class="dropdown-menu dropdown-menu-end px-1"
                aria-labelledby="bd-theme">
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="light">
                    <svg
                      class="bi me-2 opacity-50 theme-icon"
                      width="16"
                      height="16"
                      fill="currentColor">
                      <use href="#sun-fill"></use>
                    </svg>
                    Light
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center"
                    data-bs-theme-value="dark">
                    <svg
                      class="bi me-2 opacity-50 theme-icon"
                      width="16"
                      height="16"
                      fill="currentColor">
                      <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                  </button>
                </li>
                <li>
                  <button
                    type="button"
                    class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="auto">
                    <svg
                      class="bi me-2 opacity-50 theme-icon"
                      width="16"
                      height="16"
                      fill="currentColor">
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
          <span class="mb-0 text-capitalize fs-5 " id="userName">
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
              <li><a class="dropdown-item" href="/views/edit-profile.php">Editar Perfil</a></li>
              <li><a class="dropdown-item" href="/php/logout.php">Cerrar sesión</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <!-- Profile Modal -->
  <div
    class="modal fade"
    id="profileModal"
    tabindex="-1"
    aria-labelledby="profileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-full-height">
      <div class="modal-content bg-primary text-white">
        <div class="modal-header">
          <h2 class="fs-4 modal-title" id="profileModalLabel">Perfil</h2>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
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
              <a href="/edit-profile.html" class="btn btn-dark w-50 mt-3">Editar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <main>
    <article class="container mt-5 pt-5">
      <h1 class="text-center mb-4">Administrador de Agenda de Pacientes</h1>

      <!-- Panel de Control -->
      <section class="card mb-4">
        <div class="card-header">
          <h3>Panel de Control</h3>
        </div>
        <div class="card-body">
          <button class="btn btn-primary" onclick="downloadAgenda()">
            Descargar Agenda
          </button>
        </div>
      </section>

      <!-- Tabla de Agenda -->
      <section class="card">
        <div class="card-header">
          <h3>Agenda de Pacientes</h3>
          <div class="d-flex">
            <input
              type="date"
              id="filter_date"
              class="form-control me-2"
              placeholder="Filtrar por Fecha" />
            <input
              type="text"
              id="filter_name"
              class="form-control me-2"
              placeholder="Filtrar Paciente" />
            <input
              type="text"
              id="filter_doctor"
              class="form-control me-2"
              placeholder="Filtrar por doctor" />
            <label for="documentType" class="form-label me-2">Seleccionar Documento</label>
            <select class="form-select me-2" id="documentType">
              <option selected class="form-select-option is-invalid">
                Seleccione...
              </option>
              <option class="form-select-option" value="Cédula de ciudadanía">
                Cédula de ciudadanía
              </option>
              <option class="form-select-option" value="Cédula extranjera">
                Cédula extranjera
              </option>
              <option
                class="form-select-option"
                value="Permiso temporal de trabajo">
                Permiso temporal de trabajo
              </option>
              <option class="form-select-option" value="NIT">NIT</option>
              <option class="form-select-option" value="Tarjeta de identidad">
                Tarjeta de identidad
              </option>
              <option class="form-select-option" value="Pasaporte">
                Pasaporte
              </option>
              <option class="form-select-option" value="Registro civil">
                Registro civil
              </option>
              <option class="form-select-option" value="Carné diplomático">
                Carné diplomático
              </option>
              <option
                class="form-select-option"
                value="Certificado nacido vivo">
                Certificado nacido vivo
              </option>
            </select>
            <input
              type="text"
              id="filter_id"
              class="form-control me-2"
              placeholder="Numero de Documento" />
            <button class="btn btn-primary me-2" onclick="filterAgenda()">
              Filtrar
            </button>
            <button class="btn btn-secondary" onclick="clearFilterAgenda()">
              Limpiar
            </button>
          </div>
        </div>
        <div class="card-body">
          <table
            id="patient_table"
            class="table table-striped table-responsive">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Nombre del Paciente</th>
                <th>Doctor</th>
                <th class="d-none">Tipo de Documento</th>
                <!-- Agregar clase d-none para ocultar -->
                <th class="d-none">Número de Documento</th>
                <th>Orden Adjunta</th>
                <th>Seleccionar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-11-15</td>
                <td>10:00 AM</td>
                <td>Juan Pérez</td>
                <td>Dra. Gómez</td>
                <td class="d-none">Cédula de ciudadanía</td>
                <td class="d-none">123456</td>
                <!-- Valor de la cédula -->
                <td><button class="btn btn-sm btn-info">Ver</button></td>
                <td>
                  <input
                    id="checkboxdescargar"
                    type="checkbox"
                    class="form-check-input select-patient p-2" />
                </td>
              </tr>
              <tr>
                <td>2024-11-15</td>
                <td>11:00 AM</td>
                <td>María López</td>
                <td>Dr. Martínez</td>
                <td class="d-none">Cédula extranjera</td>
                <td class="d-none">789012</td>
                <!-- Valor del tipo de documento -->
                <td><button class="btn btn-sm btn-info">Ver</button></td>
                <td>
                  <input
                    type="checkbox"
                    class="form-check-input select-patient p-2" />
                </td>
              </tr>

              <tr>
                <td>2024-11-16</td>
                <td>09:00 AM</td>
                <td>Carlos Ruiz</td>
                <td>Dra. Gómez</td>
                <td class="d-none">Permiso temporal de trabajo</td>
                <td class="d-none">1082998</td>
                <td><button class="btn btn-sm btn-info">Ver</button></td>
                <td>
                  <input
                    type="checkbox"
                    class="form-check-input select-patient p-2" />
                </td>
              </tr>
              <tr>
                <td>2024-11-16</td>
                <td>09:00 AM</td>
                <td>Carlos Ruiz</td>
                <td>Dra. Gómez</td>
                <td class="d-none">Cédula de ciudadanía</td>
                <td class="d-none">123456789</td>
                <td><button class="btn btn-sm btn-info">Ver</button></td>
                <td>
                  <input
                    type="checkbox"
                    class="form-check-input select-patient p-2" />
                </td>
              </tr>
              <tr>
                <td>2024-11-16</td>
                <td>10:00 AM</td>
                <td>Lucía Fernández</td>
                <td>Dr. Pérez</td>
                <td class="d-none">Pasaporte</td>
                <td class="d-none">123456</td>
                <td><button class="btn btn-sm btn-info">Ver</button></td>
                <td>
                  <input
                    type="checkbox"
                    class="form-check-input select-patient p-2" />
                </td>

                <!-- agregar mas datos segun la base de datos -->
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </article>
  </main>

  <footer class="container-fluid text-white footer-1 mt-5">
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
              <a href="inicio.html" class="text-white nav-link text-white">Inicio</a>
            </li>
            <li>
              <a href="sobre_nosotros.html" class="text-white nav-link">Sobre Nosotros
              </a>
            </li>
            <li>
              <a href="donde_estamos.html" class="text-white nav-link">Donde Estamos</a>
            </li>
            <li>
              <a href="contactanos.html" class="text-white nav-link">Contactanos</a>
            </li>
          </ul>
        </nav>
      </section>
    </article>
  </footer>
  <!--Script de js-->
  <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="/assets/js/darkmode.js"></script>
  <script src="/assets/js/year.js"></script>
  <script src="/assets/js/Filtrar_agenda.js"></script>
</body>

</html>
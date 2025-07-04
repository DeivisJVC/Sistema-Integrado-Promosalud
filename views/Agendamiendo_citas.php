<?php
session_start();
$_SESSION['rol'];
if (!isset($_SESSION['numero_documento'])) {
  header("location:/views/inicio.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistema Integrado Promosalud</title>
  <link rel="stylesheet" href="/assets/scss/custom.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/stylecalendario.css" />
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
        <li class="nav-item  d-none" id="agendamiento">
          <!--Separar los iconos de las letras-->
          <a
            href="/views/Agendamiendo_citas.php"
            class="nav-link text-white  "
            aria-current="page">
            <img
              class="me-1"
              src="/assets/icon/icon _book.svg"
              alt="agendamiento de citas"
              width="40"
              height="40" />
            <p class="d-inline">Agendamiento de Citas
            </p>
          </a>
        </li>
        <li class="nav-item  d-none me-4" id="control_agenda">
          <a
            class="nav-link text-white active "
            aria-current="page"
            href="/views/control_agenda.php">
            <img
              class="me-1"
              src="/assets/icon/icon _document_.svg"
              alt="agenda"
              width="40"
              height="40" />
            <p class="d-inline">
              Control de agenda
            </p>
          </a>
        </li>
        <li class="nav-item  d-none" id="informes">
          <a
            class="nav-link text-white active "
            aria-current="page"
            href="/views/informes.php">
            <img
              class="me-1"
              src="/assets/icon/icon _file_.svg"
              alt="informes"
              width="40"
              height="40" />
            <p class="d-inline">Informes </p>
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
          <span class=" text-capitalize fs-5 mt-5" id="userName">
            <?php
            if ($_SESSION['rol'] == 'paciente') {
              echo ($_SESSION['nombres'] . " " . $_SESSION['apellidos']);
            } else if ($_SESSION['rol'] == 'empresa') {
              echo ($_SESSION['nombre']);
            } else if ($_SESSION['rol'] == 'administrador') {
              echo ($_SESSION['nombres']);
            } else {
              echo ("Bienvenido ");
            }
            ?>
        </li>
        </span>
        <!-- Lógica PHP para traer citas -->
        <?php require_once '../php/renderizado_campanita.php'; ?>

        <!-- Campanita de notificaciones -->
        <div class="dropdown">
          <button class="btn position-relative" type="button" id="dropdownCitas" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Ícono de campana -->
            <img src="/assets/icon/notificacion.svg" alt="notificacion" width="30px" height="30px">

            <?php if ($citas && $citas->num_rows > 0): ?>
              <span id="contadorNotificaciones" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $citas->num_rows ?>
              </span>
            <?php endif; ?>
          </button>

          <!-- Lista de notificaciones -->
          <ul class="dropdown-menu dropdown-menu-end p-2" style="min-width: 300px; max-height: 400px; overflow-y: auto;">
            <?php if ($citas && $citas->num_rows > 0): ?>
              <?php while ($cita = $citas->fetch_assoc()): ?>
                <li class="notification-item position-relative border-bottom mb-2 pb-2" data-id="<?= $cita['id'] ?>">
                  <div>
                    <strong>📅 Fecha:</strong> <?= $cita['fecha_cita'] ?><br>
                    <strong>🧪 Examen:</strong> <?= $cita['tipo_examen'] ?><br>
                    <strong>📌 Estado:</strong> <?= $cita['estado'] ?>
                  </div>
                  <!-- Botón con clase necesaria -->
                  <button type="button" class="btn-close position-absolute top-0 end-0 cerrar-notificacion"
                    aria-label="Cerrar"
                    data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Cerrar notificación"
                    onclick="marcarComoLeida(<?= $cita['id'] ?>, this)">


                  </button>
                </li>
              <?php endwhile; ?>
            <?php else: ?>
              <li><span class="dropdown-item text-muted">Todas las notificaciones fueron leidas</span></li>
            <?php endif; ?>
          </ul>
        </div>



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
  <main class="container mt-5 mb-5 main_agendamiento">
    <h1 class="text-center mt-3">Agenda tu Cita</h1>
    <section class="container-fluid text-center mt-5">
      <img
        src="https://issatec.com/wp-content/uploads/2022/01/Agendamiento-de-citas.png"
        alt="img_agendamiento"
        class="img-fluid rounded shadow" />
    </section>
    <section class="container mt-5">
      <h2>Cómo rellenar el formulario adecuadamente</h2>
      <p>
        Para completar el formulario de manera correcta, siga estos pasos:
      </p>
      <ol>
        <li>
          <strong>Adjuntar Orden:</strong> En el primer paso, adjunte el
          archivo de la orden médica haciendo clic en el botón "Adjuntar
          Orden" y seleccionando el archivo correspondiente desde su
          dispositivo.
        </li>
        <li>
          <strong>Seleccionar Hora y Fecha:</strong> En el segundo paso, elija
          la fecha y hora de su cita. Utilice el calendario para seleccionar
          el día y luego elija una hora disponible de las opciones
          proporcionadas.
        </li>
        <li>
          <strong>Confirmación:</strong> En el tercer paso, revise la
          información de su cita. Asegúrese de que todos los detalles sean
          correctos antes de hacer clic en el botón "Aceptar" para confirmar
          su cita.
        </li>
      </ol>
      <p>
        Si tiene alguna pregunta o necesita asistencia adicional, no dude en
        ponerse en contacto con nosotros. Estamos aquí para ayudarle.
      </p>
    </section>
    <form
      id="multiStepForm"
      action="../php/creacion_citas.php"
      class="container-fluid mt-5 border border-primary rounded shadow p-3"
      method="post"
      enctype="multipart/form-data"
      onsubmit="return combineDateTime()">
      <!-- Paso 1: Adjuntar -->
      <div class="step active">
        <h2>Seleccionar Tipo de Examen</h2>
        <div class="form-group mb-4 mt-4">
          <label for="input_examen">Tipo de Examen</label>
          <select class="form-control" id="input_examen" name="input_examen" required>
            <option value="" disabled selected>Seleccione una opción</option>
            <option value="retiro">Retiro</option>
            <option value="ingreso">Ingreso</option>
            <option value="periodicos">Periódicos</option>
          </select>
          <div class="invalid-feedback">Por favor selecciona un tipo de examen.</div>
        </div>
        <div class="btn-container">
          <button
            type="button"
            class="btn btn-secondary btn-step"
            onclick="prevStep()">
            Anterior
          </button>
          <button
            type="button"
            class="btn btn-primary btn-step"
            onclick="nextStep()">
            Siguiente
          </button>
        </div>
      </div>



      <!-- Paso 2: Adjuntar Orden -->
      <div class="step">
        <h2>Paso 2: Adjuntar Orden</h2>
        <div class="form-group mb-3 mt-2">
          <label for="orderFile" class="mb-2">Adjuntar Orden</label>
          <!-- <input type="text" name="text" id="text" class="form-control" placeholder="Adjuntar orden"> -->
          <input class="form-control" type="file" id="orderFile" name="orderFile"  required>
          <div class="invalid-feedback">Por favor selecciona un archivo.</div>
        </div>
        <div class="btn-container">
          <button type="button" class="btn btn-secondary btn-step" onclick="prevStep()">Anterior</button>
          <button type="button" class="btn btn-primary btn-step" onclick="nextStep()">Siguiente</button>
        </div>
      </div>

      <!-- Paso 2: Seleccionar Hora y Fecha -->
      <div class="step container-fluid  container_calendario">
        <h2 class="text-capitalize text-center">Seleccionar Hora y Fecha</h2>
        <div class="container container_card_datos_cita">
          <div class="row justify-content-between">
            <div
              class="col-md-6 d-flex justify-content-center align-items-center">
              <div
                class="calendar my-5 py-5"
                style="max-width: 500px; z-index: 1; position: relative">
                <div class="calendar-header">
                  <div class="d-flex justify-content-between">
                    <button id="prevMonth" type="button" class="btn btn-light btn-sm">
                      &lt;
                    </button>
                    <h5 id="currentMonth" class="m-0" id="year_month">
                      Noviembre 2024
                    </h5>
                    <button id="nextMonth" type="button" class="btn btn-light btn-sm">
                      &gt;
                    </button>
                  </div>
                </div>
                <div class="row text-center fw-bold">
                  <div class="col day">Lun</div>
                  <div class="col day">Mar</div>
                  <div class="col day">Mie</div>
                  <div class="col day">Jue</div>
                  <div class="col day">Vie</div>
                  <div class="col day">Sab</div>
                  <div class="col day">Dom</div>
                </div>
                <div id="calendarDays" class="text-center">
                  <!-- se generarn losd dias del mes -->
                </div>
              </div>
            </div>
            <div class="col-md-5 align-content-center">
              <div class="row my-5" id="selec">
                <div class="col-6 mb-3">
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    7:00 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    7:30 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    8:00 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    8:30 AM
                  </button>
                </div>
                <div class="col-6 mb-3">
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    9:00 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    9:30 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    10:00 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    10:30 AM
                  </button>
                  <button class="btn btn-primary w-100 mb-2 time-btn" type="button">
                    11:00 AM
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 align-content-center">
            <div class="card bg-primary">
              <div class="card-body">
                <h2 class="card-title text-white text-center" id="selectedyear">año</h2>
                <h2 class="card-title text-white text-center" id="selectedmonth">mes</h2>
                <h2 class="card-text text-white text-center" id="selectedDay">dia</h2>
                <div id="dayError" class="text-danger text-center"></div> <!-- Mensaje de error para el día -->
                <h2 class="card-text text-white text-center" id="selectedTime">Hora</h2>
                <div id="timeError" class="text-danger text-center"></div> <!-- Mensaje de error para la hora -->
              </div>
            </div>
          </div>
        </div>
        <div class="btn-container justify-content-center">
          <button
            type="button"
            class="btn btn-secondary btn-step"
            onclick="prevStep()">
            Anterior
          </button>
          <button
            type="button"
            class="btn btn-primary btn-step"
            id="Elegir_Cita"
            onclick="Elegir_cita()">
            Aceptar
          </button>
        </div>
      </div>
      <!-- Modal de Error -->
      <div
        class="modal fade"
        id="errorModal"
        tabindex="-1"
        aria-labelledby="errorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content error-modal"> <!-- Clase personalizada -->
            <div class="modal-header">
              <h5 class="modal-title" id="errorModalLabel">Error</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorModalBody">
              <!-- Aquí se insertarán los mensajes de error dinámicamente -->
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal de Confirmación -->
      <div
        class="modal fade"
        id="confirmationModal"
        tabindex="-1"
        aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmationModalLabel">
                Confirmación de Cita
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>
                Estimado/a
                <span id="modaluserName" class="fw-bold">

                </span>
              </p>
              <p class="">
                Su cita ha sido programada para el
                <span id="modalConfirmDay" class="fw-bold">[día]</span> del
                <span id="modalConfirmMonth" class="fw-bold">[mes]</span> del
                <span id="modalConfirmYear" class="fw-bold">[año]</span> a las
                <span id="modalConfirmTime" class="fw-bold">[hora]</span>
              </p>
              <p>
                Dirección: Cra 11#18-90, Barrio Territorial, Centro Médico
                Pablo García Infante, Santa Marta.
              </p>
              <p>
                Por favor, asegúrese de llegar a tiempo y llevar consigo toda
                la documentación necesaria.
              </p>
              <p>
                Si tiene alguna pregunta o necesita reprogramar, no dude en
                contactarnos. Saludos cordiales.
              </p>
              <div class="d-flex align-items-center">
                <img
                  src="/assets/icon/mail_icon-icons.com_72317.svg"
                  alt="correo"
                  width="30"
                  height="30" />
                <p class="m-3">Promosalud@promosalud.org</p>
              </div>
              <div class="d-flex align-items-center">
                <img
                  src="/assets/icon/telefonoconfirmacion.svg"
                  alt="teléfono"
                  width="30"
                  height="30" />
                <p class="m-3">4233421 - 4214882 - 4309810 - 4202158</p>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="fecha_cita" id="fecha_cita">
              <button
                type="submit"
                class="btn btn-primary"
                data-bs-dismiss="modal">
                Confirmar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>


  <footer class="container-fluid text-white footer-1 mt-auto mt-5 mt-auto">
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
  <script src="/assets/js/formulario_partes.js"></script>
  <script src="/assets/js/fecha_datos.js"></script>
  <script type="module" src="/assets/js/validar-header.js"></script>
  <script>
    const rol = "<?php echo isset($_SESSION['rol']) ? $_SESSION['rol'] : ''; ?>";
  </script>
  <script src="/assets/js/agenda-cit.js"></script>
  <script src="/assets//js//contador_cita_paciente_agenda.js"></script>
</body>

</html>
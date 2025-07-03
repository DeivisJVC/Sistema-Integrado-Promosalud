<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Depuración: Verificar conexión a la base de datos
if ($conn->connect_error) {
  // Registra el error en el log de PHP, no solo lo muestra en pantalla
  error_log('Error de conexión a la base de datos: ' . $conn->connect_error);
  die('No se pudo conectar a la base de datos. Por favor, inténtelo de nuevo más tarde.');
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $numero_documento = isset($_SESSION['numero_documento']) ? $_SESSION['numero_documento'] : '';
  $tipo_examen = isset($_POST['input_examen']) ? $_POST['input_examen'] : '';
  $fecha_cita = isset($_POST['fecha_cita']) ? $_POST['fecha_cita'] : '';

  // --- NUEVA DEPURACIÓN (usando error_log para no afectar la salida HTML) ---
  error_log("DEBUG: numero_documento = " . (empty($numero_documento) ? "VACIO" : $numero_documento));
  error_log("DEBUG: tipo_examen = " . (empty($tipo_examen) ? "VACIO" : $tipo_examen));
  error_log("DEBUG: fecha_cita = " . (empty($fecha_cita) ? "VACIO" : $fecha_cita));
  error_log("DEBUG: _FILES['orderFile'] isset = " . (isset($_FILES['orderFile']) ? "SI" : "NO"));
  if (isset($_FILES['orderFile'])) {
    error_log("DEBUG: _FILES['orderFile']['error'] = " . $_FILES['orderFile']['error']);
    error_log("DEBUG: _FILES['orderFile']['size'] = " . $_FILES['orderFile']['size']); // Útil para límites de tamaño
  }
  // --- FIN NUEVA DEPURACIÓN ---

  // Validación básica de los datos del formulario
  if (empty($numero_documento) || empty($tipo_examen) || empty($fecha_cita) || !isset($_FILES['orderFile']) || $_FILES['orderFile']['error'] !== UPLOAD_ERR_OK) {
    // Mejorar el mensaje de error para el usuario final o redirigir
    echo "Faltan datos necesarios para agendar la cita o el archivo no se adjuntó correctamente.";
    exit();
  }

  // Obtener ID del paciente
  $sql_paciente = "SELECT id FROM paciente WHERE numero_documento = ?";
  $stmt_paciente = $conn->prepare($sql_paciente);
  if ($stmt_paciente === false) {
    error_log('Error al preparar la consulta de paciente: ' . $conn->error);
    echo 'Error interno al buscar el paciente.';
    $conn->close();
    exit();
  }
  $stmt_paciente->bind_param("s", $numero_documento);
  $stmt_paciente->execute();
  $result_paciente = $stmt_paciente->get_result();

  if ($result_paciente->num_rows === 0) {
    echo "El paciente con el número de documento proporcionado no fue encontrado.";
    $stmt_paciente->close();
    $conn->close();
    exit();
  }

  $id_paciente = $result_paciente->fetch_assoc()['id'];
  $stmt_paciente->close(); // Cierra el statement de paciente una vez que ya no se necesita

  // Guardar archivo PDF
  $archivo = $_FILES['orderFile'];
  $nombreArchivo = basename($archivo['name']);
  // Generar un nombre único para evitar colisiones
  $rutaFinal = "../assets/ordenes/" . uniqid('orden_') . "_" . $nombreArchivo;

  if (!move_uploaded_file($archivo['tmp_name'], $rutaFinal)) {
    error_log('Error al mover el archivo subido: ' . $rutaFinal);
    echo "Error al subir la orden médica. Por favor, inténtelo de nuevo.";
    $conn->close();
    exit();
  }

  // Definición de exámenes por tipo
  $examenes_por_tipo = [
    "ingreso" => [
      "Examen de salud fisica",
      "Examen de salud mental",
      "Examen biopsicosocial",
      "Examen de Anamnesis",
      "Examen Espirometría",
      "Electrocardiograma",
      "Radiografias",
      "Pruebas toxicologia"
    ],
    "periodicos" => [
      "Examen de sangre",
      "Examen de visión",
      "Examen de audiometría",
      "Hemograma",
      "Examen de glicemia"
    ],
    "retiro" => [
      "Examen Espirometría",
      "Examen de Audiometria",
      "Examen de sangre",
      "Examen de orina"
    ]
  ];

  // Insertar en tabla `agenda`
  $sql_agenda = "INSERT INTO agenda (id_paciente, tipo_examen, fecha_cita, orden_cita, estado, leida)
                   VALUES (?, ?, ?, ?, 'Pendiente', 0)";

  $_SESSION['tipo_examen'] = $tipo_examen; // Guardar tipo de examen en la sesión
  $stmt_agenda = $conn->prepare($sql_agenda);
  if ($stmt_agenda === false) {
    error_log('Error al preparar la sentencia de agenda: ' . $conn->error);
    echo 'Error interno al agendar la cita.';
    // Eliminar el archivo subido si no se pudo agendar la cita
    if (file_exists($rutaFinal)) {
      unlink($rutaFinal);
    }
    $conn->close();
    exit();
  }
  $stmt_agenda->bind_param("isss", $id_paciente, $tipo_examen, $fecha_cita, $rutaFinal);

  if ($stmt_agenda->execute()) {
    // Insertar exámenes asociados en `examenes_realizar`
    if (isset($examenes_por_tipo[$tipo_examen])) {
      $examenes = $examenes_por_tipo[$tipo_examen];
      $sql_insert_examenes = "INSERT INTO examenes_realizar(id_paciente, nombre_examen, resultado, estado) VALUES (?,?,'','pendiente')";

      // Corregido: La variable es $stmt_examen para consistencia
      $stmt_examen = $conn->prepare($sql_insert_examenes);

      if ($stmt_examen === false) {
        error_log('Error al preparar la sentencia para examenes_realizar: ' . $conn->error);
        // Si la preparación falla, se registra y se puede continuar sin insertar exámenes
      } else {
        foreach ($examenes as $nombre_examen) {
          $stmt_examen->bind_param("is", $id_paciente, $nombre_examen);
          if (!$stmt_examen->execute()) {
            error_log('Error al insertar examen "' . $nombre_examen . '": ' . $stmt_examen->error);
          }
        }
        $stmt_examen->close(); // Cierra el statement después de usarlo
      }
    }

    $stmt_agenda->close();
    $conn->close();
    // Redirigir solo si todo fue exitoso
    header("Location: ../views/Menu_cita.php");
    exit();
  } else {
    error_log('Error al guardar la cita en la tabla agenda: ' . $stmt_agenda->error);
    echo "Error al guardar la cita. Por favor, inténtelo de nuevo.";
    // Eliminar el archivo subido si la cita no se pudo guardar
    if (file_exists($rutaFinal)) {
      unlink($rutaFinal);
    }
    $stmt_agenda->close();
    $conn->close();
    exit();
  }
}

$conn->close(); // Asegúrate de cerrar la conexión si no se ejecuta el POST

// Depuración final de POST y FILES (mantener para análisis fuera de la ejecución del script principal)
// Estas líneas son útiles si el script no llega a la lógica del POST
error_log('Datos recibidos (fuera de POST): ' . print_r($_POST, true));
error_log('Archivos recibidos (fuera de POST): ' . print_r($_FILES, true));


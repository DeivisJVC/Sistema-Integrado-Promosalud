
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
    error_log('Error de conexión a la base de datos: ' . $conn->connect_error);
    die('No se pudo conectar a la base de datos: ' . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero_documento = isset($_SESSION['numero_documento']) ? $_SESSION['numero_documento'] : '';
    $tipo_examen = isset($_POST['input_examen']) ? $_POST['input_examen'] : '';
    $fecha_cita = isset($_POST['fecha_cita']) ? $_POST['fecha_cita'] : '';

    // Validación básica
    if (empty($numero_documento) || empty($tipo_examen) || empty($fecha_cita) || !isset($_FILES['orderFile']) || $_FILES['orderFile']['error'] !== UPLOAD_ERR_OK) {
        echo "Faltan datos necesarios.";
        exit();
    }

    // Obtener ID del paciente
    $sql_paciente = "SELECT id FROM paciente WHERE numero_documento = ?";
    $stmt_paciente = $conn->prepare($sql_paciente);
    $stmt_paciente->bind_param("s", $numero_documento);
    $stmt_paciente->execute();
    $result_paciente = $stmt_paciente->get_result();

    if ($result_paciente->num_rows === 0) {
        echo "No se encontró el paciente.";
        $stmt_paciente->close();
        $conn->close();
        exit();
    }

    $id_paciente = $result_paciente->fetch_assoc()['id'];
    //$stmt_paciente->close();

    // Guardar archivo PDF
    $archivo = $_FILES['orderFile'];
    $nombreArchivo = basename($archivo['name']);
    $rutaTemporal = $archivo['tmp_name'];
    $rutaFinal = "../assets/ordenes/" . uniqid() . "_" . $nombreArchivo;

    if (!move_uploaded_file($rutaTemporal, $rutaFinal)) {
        echo "Error al subir el archivo.";
        $conn->close();
        exit();
    }

    // Insertar en tabla `agenda`
    $sql_agenda = "INSERT INTO agenda (id_paciente, tipo_examen, fecha_cita, orden_cita, estado)
                   VALUES (?, ?, ?, ?, 'Pendiente')";

    $_SESSION['tipo_examen'] = $tipo_examen; // Guardar tipo de examen en la sesión
    $stmt_agenda = $conn->prepare($sql_agenda);
    $stmt_agenda->bind_param("isss", $id_paciente, $tipo_examen, $fecha_cita, $rutaFinal);
    //falta agregar la tabla examenes_realizar el id del paciente y medico
      

    if ($stmt_agenda->execute()) {
        $stmt_agenda->close();
        $conn->close();
        header("Location: ../views/Menu_cita.php"); // Redirigir a la página de inicio
        exit();
    } else {
        echo "Error al guardar la cita: " . $stmt_agenda->error;
        $stmt_agenda->close();
        $conn->close();
        exit();
    }
}

$conn->close();

// Depuración: Verificar datos recibidos
error_log('Datos recibidos: ' . print_r($_POST, true));
error_log('Archivos recibidos: ' . print_r($_FILES, true));
error_log('Fecha recibida: ' . $_POST['fecha_cita']);
?>
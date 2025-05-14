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
    $numero_documento = $_SESSION['numero_documento'];
    $tipo_examen = $_POST['input_examen'];
    $fecha_cita = $_POST['fecha_cita'];

    // Validación básica
    if (empty($tipo_examen) || empty($fecha_cita) || !isset($_FILES['orderFile'])) {
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
        exit();
    }

    $id_paciente = $result_paciente->fetch_assoc()['id'];

    // Guardar archivo PDF
    $archivo = $_FILES['orderFile'];
    $nombreArchivo = $archivo['name'];
    $rutaTemporal = $archivo['tmp_name'];
    $rutaFinal = "../assets/ordenes/" . uniqid() . "_" . basename($nombreArchivo);

    if (!move_uploaded_file($rutaTemporal, $rutaFinal)) {
        echo "Error al subir el archivo.";
        exit();
    }

    // Insertar en tabla `agenda`
    $sql_agenda = "INSERT INTO agenda (id_paciente, tipo_examen, fecha_cita, orden_cita, estado)
                   VALUES (?, ?, ?, 'Pendiente')";
    $stmt_agenda = $conn->prepare($sql_agenda);
    $stmt_agenda->bind_param("isss", $id_paciente, $tipo_examen, $fecha_cita, $rutaFinal);

    if ($stmt_agenda->execute()) {
        echo "Cita agendada correctamente.";
        header("Location: ../views/Menu_cita.php"); // Redirigir a la página de inicio
    } else {
        echo "Error al guardar la cita: " . $stmt_agenda->error;
    }

    $stmt_agenda->close();
}

$stmt_paciente->close();
$conn->close();

// Depuración: Verificar datos recibidos
error_log('Datos recibidos: ' . print_r($_POST, true));
error_log('Archivos recibidos: ' . print_r($_FILES, true));
?>

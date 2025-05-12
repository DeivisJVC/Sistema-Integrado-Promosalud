<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $contraseña = $_POST['contraseña'];

    // Validar que los campos no estén vacíos
    if (empty($tipo_documento) || empty($numero_documento) || empty($contraseña)) {
        header("Location: ../views/inicio.php?error=1"); // Error: Campos vacíos
        exit();
    }

    // Determinar la tabla según el tipo de documento
    $tabla = '';
    switch ($tipo_documento) {
        case 'cc': // Cédula de ciudadanía
        case 'ce': // Cédula extranjera
        case 'ti': // Tarjeta de identidad
        case 'passport': // Pasaporte
            $tabla = 'paciente';
            break;
        case 'rut': // NIT
            $tabla = 'empresa';
            break;
        case 'ptt': // Permiso temporal de trabajo
            $tabla = 'usuarios_administrativos';
            break;
        default:
            header("Location: ../views/inicio.php?error=2"); // Error: Tipo de documento no válido
            exit();
    }

    // Construir la consulta SQL según la tabla
    if ($tabla === 'paciente') {
        $sql = "SELECT nombres, apellidos, rol, contraseña_confirmacion FROM $tabla WHERE tipo_documento = ? AND numero_documento = ?";
    } else {
        // Para empresas y usuarios administrativos no se requiere apellidos
        $sql = "SELECT nombres, rol, contraseña_confirmacion FROM $tabla WHERE tipo_documento = ? AND numero_documento = ?";
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    $stmt->bind_param("ss", $tipo_documento, $numero_documento);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();

        // Verificar la contraseña (comparación directa)
        if ($contraseña === $fila['contraseña_confirmacion']) {
            // Guardar datos en la sesión
            $_SESSION['numero_documento'] = $numero_documento;
            $_SESSION['nombres'] = $fila['nombres'];
            $_SESSION['apellidos'] = isset($fila['apellidos']) ? $fila['apellidos'] : ''; // Solo para pacientes
            $_SESSION['rol'] = $fila['rol'];

            // Redirigir al menú principal
            header("Location: ../views/Menu_cita.php");
            exit();
        } else {
            // Contraseña incorrecta
            header("Location: ../views/inicio.php?error=3"); // Error: Contraseña incorrecta
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../views/inicio.php?error=4"); // Error: Usuario no encontrado
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
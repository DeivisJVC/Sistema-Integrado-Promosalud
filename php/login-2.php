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
    if ($tipo_documento === 'cc' || $tipo_documento === 'ce' || $tipo_documento === 'ti' || $tipo_documento === 'passport') {
        // Verificar primero en la tabla usuarios_administrativos
        $sql_check = "SELECT nombres, rol, contraseña_confirmacion FROM usuarios_administrativos WHERE tipo_documento = ? AND numero_documento = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ss", $tipo_documento, $numero_documento);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Si el usuario existe en usuarios_administrativos
            $tabla = 'usuarios_administrativos';
            $fila = $result_check->fetch_assoc();
        } else {
            // Si no existe en usuarios_administrativos, buscar en paciente
            $sql_check = "SELECT nombres, apellidos, rol, contraseña_confirmacion FROM paciente WHERE tipo_documento = ? AND numero_documento = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("ss", $tipo_documento, $numero_documento);
            $stmt_check->execute();
            $result_check = $stmt_check->get_result();

            if ($result_check->num_rows > 0) {
                $tabla = 'paciente';
                $fila = $result_check->fetch_assoc();
            } else {
                // Usuario no encontrado en ninguna tabla
                header("Location: ../views/inicio.php?error=4");
                 // Error: Usuario no encontrado
                exit();
            }
        }
        $stmt_check->close();
    } else if ($tipo_documento === 'rut') {
        // Manejar el caso de empresas
        $tabla = 'empresa';
        $sql = "SELECT nombre, rol, contraseña_confirmacion FROM $tabla WHERE rut = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $numero_documento);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
        } else {
            header("Location: ../views/inicio.php?error=4"); // Error: Usuario no encontrado
            exit();
        }
    } else {
        header("Location: ../views/inicio.php?error=2"); // Error: Tipo de documento no válido
        exit();
    }

    // Verificar la contraseña (comparación directa)
    if ($contraseña === $fila['contraseña_confirmacion']) {
        // Guardar datos en la sesión
        $_SESSION['numero_documento'] = $numero_documento;
        $_SESSION['nombres'] = isset($fila['nombres']) ? $fila['nombres'] : ''; // Solo para pacientes y administradores
        $_SESSION['apellidos'] = isset($fila['apellidos']) ? $fila['apellidos'] : ''; // Solo para pacientes
        $_SESSION['rol'] = $fila['rol'];
        $_SESSION['nombre'] = isset($fila['nombre']) ? $fila['nombre'] : ''; // Solo para empresas


        // Redirigir al menú principal
        header("Location: ../views/Menu_cita.php");
        exit();
    } else {
        // Contraseña incorrecta
        header("Location: ../views/inicio.php?error=3"); // Error: Contraseña incorrecta
        exit();
    }
}
?>
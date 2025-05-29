<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Validación de sesión
if (!isset($_SESSION['numero_documento']) && !isset($_SESSION['id_empresa'])) {
    header("Location: ../views/inicio.php");
    exit();
}

// Conexión
$conn = new mysqli("localhost", "root", "", "sistema_integrado_promosalud2");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Detectar tipo de usuario
$rol = $_SESSION['rol'] ?? '';
$isEmpresa = ($rol === 'empresa');
$isAdmin = ($rol === 'administrador');

// Sanitizar datos comunes
$nombres   = trim($_POST['nombres'] ?? '');
$apellidos = trim($_POST['apellidos'] ?? '');
$telefono  = trim($_POST['telefono'] ?? '');
$correo    = trim($_POST['correo'] ?? '');

// Imagen por defecto
$fotoRuta = $_SESSION['foto'] ?? "";

// Procesar imagen (igual que antes)
if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $file = $_FILES['img'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png','webp'];

    if (in_array($ext, $allowed) && $file['size'] <= 2097152) {
        $newName = uniqid('img_', true) . '.' . $ext;
        $dir = "../assets/img/img_users/";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $path = $dir . $newName;
        if (move_uploaded_file($file['tmp_name'], $path)) {
            $fotoRuta = $path;
        }
    }
}

// Actualizar según el tipo de usuario
if ($isEmpresa && isset($_SESSION['id_empresa'])) {
    // EMPRESA
    $nombre = trim($_POST['nombre'] ?? '');
    $ciudad = trim($_POST['ciudad'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $id_empresa = $_SESSION['id_empresa'];

    $sql = "UPDATE empresa SET nombre = ?, ciudad = ?, direccion = ?, telefono = ?, correo = ?, img = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) die("Error al preparar SQL: " . $conn->error);

    $stmt->bind_param("ssssssi", $nombre, $ciudad, $direccion, $telefono, $correo, $fotoRuta, $id_empresa);

    if ($stmt->execute()) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['correo'] = $correo;
        $_SESSION['foto'] = $fotoRuta;
        header("Location: ../views/edit-profile.php?success=1");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
} elseif ($isAdmin) {
    // ADMINISTRADOR
    $cargo = trim($_POST['cargo'] ?? '');
    $numero_documento = $_SESSION['numero_documento'];

    $sql = "UPDATE usuarios_administrativos SET nombres = ?, cargo = ?, telefono = ?, correo = ?, img = ? WHERE numero_documento = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) die("Error al preparar SQL: " . $conn->error);

    $stmt->bind_param("ssssss", $nombres, $cargo, $telefono, $correo, $fotoRuta, $numero_documento);

    if ($stmt->execute()) {
        $_SESSION['nombres'] = $nombres;
        $_SESSION['cargo'] = $cargo;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['correo'] = $correo;
        $_SESSION['foto'] = $fotoRuta;
        header("Location: ../views/edit-profile.php?success=1");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

} else {
    // PACIENTE (tu lógica original)
    $ocupacion = trim($_POST['ocupacion'] ?? '');
    $ciudad    = trim($_POST['ciudad'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $numero_documento = $_SESSION['numero_documento'];

    $sql = "UPDATE paciente SET nombres = ?, apellidos = ?, ocupacion = ?, telefono = ?, ciudad = ?, direccion = ?, correo = ?, img = ? WHERE numero_documento = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) die("Error al preparar SQL: " . $conn->error);

    $stmt->bind_param("sssssssss", $nombres, $apellidos, $ocupacion, $telefono, $ciudad, $direccion, $correo, $fotoRuta, $numero_documento);

    if ($stmt->execute()) {
        $_SESSION['nombres'] = $nombres;
        $_SESSION['apellidos'] = $apellidos;
        $_SESSION['ocupacion'] = $ocupacion;
        $_SESSION['telefono'] = $telefono;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['correo'] = $correo;
        $_SESSION['foto'] = $fotoRuta;
        header("Location: ../views/edit-profile.php?success=1");
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}

$conn->close();
?>
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Validación de sesión
if (!isset($_SESSION['numero_documento'])) {
    header("Location: login.php");
    exit();
}

// Conexión
$conn = new mysqli("localhost", "root", "", "sistema_integrado_promosalud");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$numero_documento = $_SESSION['numero_documento'];

// Sanitizar datos
$nombres   = trim($_POST['nombres'] ?? '');
$apellidos = trim($_POST['apellidos'] ?? '');
$ocupacion = trim($_POST['ocupacion'] ?? '');
$telefono  = trim($_POST['telefono'] ?? '');
$ciudad    = trim($_POST['ciudad'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');
$correo    = trim($_POST['correo'] ?? '');

// Separar nombres
$nombresArray = explode(" ", $nombres);
$primer_nombre = $nombresArray[0] ?? "";
$segundo_nombre = $nombresArray[1] ?? "";

$apellidosArray = explode(" ", $apellidos);
$primer_apellido = $apellidosArray[0] ?? "";
$segundo_apellido = $apellidosArray[1] ?? "";

// Imagen por defecto
$fotoRuta = $_SESSION['foto'] ?? "";


// Si se presionó "Quitar foto", borramos la imagen actual y asignamos la imagen por defecto
if (isset($_POST['quitar_foto']) && $_POST['quitar_foto'] == '1') {
    if (!empty($_SESSION['foto']) && file_exists($_SESSION['foto'])) {
        unlink($_SESSION['foto']); // Elimina la imagen del servidor
    }
    $fotoRuta = 'img/img_users/default.svg'; // Ruta por defecto
}

// Procesar imagen
if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $file = $_FILES['img'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($ext, $allowed) && $file['size'] <= 2097152) {
        $newName = uniqid('img_', true) . '.' . $ext;
        $dir = "img/img_users/";

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $path = $dir . $newName;
        if (move_uploaded_file($file['tmp_name'], $path)) {
            $fotoRuta = $path;
        }
    }
}

// Actualizar datos
$sql = "UPDATE paciente SET 
            primer_nombre = ?, segundo_nombre = ?, 
            primer_apellido = ?, segundo_apellido = ?, 
            ocupacion = ?, telefono = ?, ciudad = ?, 
            direccion = ?, correo = ?, img = ?
        WHERE numero_documento = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta SQL: " . $conn->error);
}

$stmt->bind_param("sssssssssss", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $ocupacion, $telefono, $ciudad, $direccion, $correo, $fotoRuta, $numero_documento);


if ($stmt->execute()) {
    $_SESSION['primer_nombre'] = $primer_nombre;
    $_SESSION['segundo_nombre'] = $segundo_nombre;
    $_SESSION['primer_apellido'] = $primer_apellido;
    $_SESSION['segundo_apellido'] = $segundo_apellido;
    $_SESSION['ocupacion'] = $ocupacion;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['ciudad'] = $ciudad;
    $_SESSION['direccion'] = $direccion;
    $_SESSION['correo'] = $correo;
    $_SESSION['foto'] = $fotoRuta;

    header("Location: edit-profile.php?success=1");
    exit();
} else {
    echo "Error al actualizar: " . $stmt->error;
}

$conn->close();
?>

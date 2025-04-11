<?php
$host = 'localhost';
$dbname = 'sistema_integrado_promosalud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Recibir los datos del formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ocupacion = $_POST['ocupacion'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$numero_documento = $_POST['numero_documento'];

try {
    // Preparar la consulta SQL
    $sql = $pdo->prepare("
        UPDATE paciente 
        SET 
            primer_nombre = :primer_nombre,
            segundo_nombre = :segundo_nombre,
            ocupacion = :ocupacion,
            telefono = :telefono,
            ciudad = :ciudad,
            direccion = :direccion,
            correo = :correo
        WHERE numero_documento = :numero_documento
    ");

    // Dividir nombres y apellidos
    $nombres_array = explode(' ', $nombres, 2);
    $primer_nombre = $nombres_array[0];
    $segundo_nombre = isset($nombres_array[1]) ? $nombres_array[1] : '';

    $apellidos_array = explode(' ', $apellidos, 2);
    $primer_apellido = $apellidos_array[0];
    $segundo_apellido = isset($apellidos_array[1]) ? $apellidos_array[1] : '';

    // Vincular parámetros
    $sql->bindParam(':primer_nombre', $primer_nombre);
    $sql->bindParam(':segundo_nombre', $segundo_nombre);
    $sql->bindParam(':ocupacion', $ocupacion);
    $sql->bindParam(':telefono', $telefono);
    $sql->bindParam(':ciudad', $ciudad);
    $sql->bindParam(':direccion', $direccion);
    $sql->bindParam(':correo', $correo);
    $sql->bindParam(':numero_documento', $numero_documento);

    // Ejecutar la consulta
    $sql->execute();

    // Redirigir al usuario
    header("Location: edit-profile.php?success=1");
    exit();
} catch (PDOException $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
    exit();
}
?>
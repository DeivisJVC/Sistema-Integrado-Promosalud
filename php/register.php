<?php
session_start(); // Iniciar la sesión

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $form_type = $_POST['form_type']; // Identificar el formulario enviado

  // Conexión a la base de datos
  $conexion = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
  }

  if ($form_type === 'paciente') {
    // Datos del formulario de paciente
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $ocupacion = $_POST['ocupacion'];
    $id_empresa = $_POST['id_empresa'];
    $contraseña_confirmacion = $_POST['contraseña_confirmacion'];
    $rol = $_POST['rol']; // Campo oculto

    // Guardar el rol en la sesión
    $_SESSION['rol'] = $rol;

    // Consulta SQL para insertar datos en la tabla paciente
    $sql = "INSERT INTO paciente (nombres, apellidos, fecha_nacimiento, telefono, correo, tipo_documento, numero_documento, ciudad, direccion, ocupacion, id_empresa,contraseña_confirmacion, rol) 
            VALUES ('$nombres', '$apellidos', '$fecha_nacimiento', '$telefono', '$correo', '$tipo_documento', '$numero_documento', '$ciudad', '$direccion', '$ocupacion','$id_empresa', '$contraseña_confirmacion', '$rol')";

    if (mysqli_query($conexion, $sql)) {
      echo "Paciente registrado correctamente.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
  } elseif ($form_type === 'empresa') {
    // Datos del formulario de empresa
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $sector = $_POST['sector'];
    $correo = $_POST['correo'];
    $contraseña_confirmacion = $_POST['contraseña_confirmacion'];
    $estado = "activo"; // Activo por defecto
    $rol = $_POST['rol']; // Campo oculto

    // Guardar el rol en la sesión
    $_SESSION['rol'] = $rol;

    // Consulta SQL para insertar datos en la tabla empresa
    $sql = "INSERT INTO empresa (rut, nombre, telefono, direccion, ciudad, sector, correo, contraseña_confirmacion ,estado, rol) 
            VALUES ('$rut', '$nombre', '$telefono', '$direccion', '$ciudad', '$sector', '$correo', '$$contraseña_confirmacion','$estado', '$rol')";

    if (mysqli_query($conexion, $sql)) {
      echo "Empresa registrada correctamente.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
  } else if ($form_type == 'administrador') {
    //Datos del formulario de administrador
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $rol = $_POST['rol']; // Campo oculto
    $contraseña_confirmacion = $_POST['contraseña_confirmacion'];
    $_SESSION['rol'] = $rol;
    $_SESSION['cargo'] = $cargo; // Guardar el cargo en la sesión

    // Consulta SQL para insertar datos en la tabla administrador
    $sql = "INSERT INTO usuarios_administrativos (tipo_documento, numero_documento, nombres,apellidos ,correo, telefono, cargo,rol ,contraseña_confirmacion) 
            VALUES ('$tipo_documento', '$numero_documento', '$nombres', '$apellidos','$correo', '$telefono', '$cargo', '$rol','$contraseña_confirmacion')";
      
    if (mysqli_query($conexion, $sql)) {
      echo "Administrador registrado correctamente.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
  }
  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
}

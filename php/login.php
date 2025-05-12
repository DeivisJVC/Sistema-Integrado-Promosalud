<?php 
session_start();
$tipo_documento = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$contraseña = $_POST['contraseña'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}

// Modificar la consulta para incluir primer_nombre y segundo_nombre
$sql = "SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido FROM paciente WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento' AND contraseña_confirmacion = '$contraseña'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc(); // Obtener los datos del usuario
    $_SESSION['numero_documento'] = $numero_documento;
    $_SESSION['primer_nombre'] = $fila['primer_nombre'];
    $_SESSION['segundo_nombre'] = $fila['segundo_nombre'];
    $_SESSION['primer_apellido'] = $fila['primer_apellido'];
    $_SESSION['segundo_apellido'] = $fila['segundo_apellido'];
    header("location:../views/Menu_cita.php");

    
} else {
    echo "<div class='modal fade' id='loginErrorModal' tabindex='-1' role='dialog' aria-labelledby='loginErrorModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='loginErrorModalLabel'>Error de Inicio de Sesión</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
              Usuario no logueado. Regístrese.
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
              <a href='../views/registrate.php' class='btn btn-primary'>Registrarse</a>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('#loginErrorModal').modal('show');
        });
      </script>";
} 

$conn->close();
?>

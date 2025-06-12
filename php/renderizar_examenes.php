<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
$sql = '';
if ($rol === 'administrador'  && isset($_SESSION['numero_documento'])) {
  $sql = "SELECT 
            a.tipo_examen,
            p.nombres, 
            p.apellidos, 
            p.tipo_documento, 
            p.numero_documento,
            a.estado,
            a.id_paciente
          FROM agenda a
          JOIN paciente p ON a.id_paciente = p.id
          WHERE a.estado = 'Pendiente'";
} else {
  echo "<tr><td colspan='8'>Error: No tiene permisos suficientes o falta información de sesión.</td></tr>";
  $conn->close();
  exit;
}
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr 
      data-tipo-documento='" . htmlspecialchars($row['tipo_documento']) . "' 
      data-numero-documento='" . htmlspecialchars($row['numero_documento']) . "' 
      data-id-paciente='" . htmlspecialchars($row['id_paciente']) . "'>";
    echo "<td>" . htmlspecialchars($row['nombres']) . "</td>";
    echo "<td>" . htmlspecialchars($row['apellidos']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tipo_examen']) . "</td>";
    echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
    echo "<td><input type='checkbox' class='form-check-input select-patient-checkbox p-2' /></td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='7'>No hay exámenes para realizar.</td></tr>";
  echo $rol;
}
$conn->close();
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Determinar el rol y construir la consulta adecuada
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
$sql = '';
if ($rol === 'paciente' && isset($_SESSION['numero_documento'])) {
  // Paciente: solo sus citas
  $numero_documento = $conn->real_escape_string($_SESSION['numero_documento']);
  $sql = "SELECT a.fecha_cita, 
                   TIME_FORMAT(a.fecha_cita, '%H:%i') as hora_cita,
                   p.nombres, p.apellidos, p.tipo_documento, p.numero_documento,
                   a.tipo_examen, a.orden_cita, a.estado, a.id
            FROM agenda a
            JOIN paciente p ON a.id_paciente = p.id
            WHERE p.numero_documento = '$numero_documento'";
} elseif ($rol === 'empresa' && isset($_SESSION['id_empresa'])) {
  // Empresa: citas de pacientes vinculados a la empresa
  $id_empresa = $conn->real_escape_string($_SESSION['id_empresa']);
  $sql = "SELECT a.fecha_cita, 
                   TIME_FORMAT(a.fecha_cita, '%H:%i') as hora_cita,
                   p.nombres, p.apellidos, p.tipo_documento, p.numero_documento,
                   a.tipo_examen, a.orden_cita, a.estado, a.id
            FROM agenda a
            JOIN paciente p ON a.id_paciente = p.id
            WHERE p.id_empresa = '$id_empresa'";  // el id de la empresa en la tabla paciente y el id de la empresa en la tabla

} else {
  // Administrador u otro: todas las citas
  $sql = "SELECT a.fecha_cita, 
                   TIME_FORMAT(a.fecha_cita, '%H:%i') as hora_cita,
                   p.nombres, p.apellidos, p.tipo_documento, p.numero_documento,
                   a.tipo_examen, a.orden_cita, a.estado, a.id
            FROM agenda a
            JOIN paciente p ON a.id_paciente = p.id";
}
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Puedes ajustar los campos según tu estructura real
    echo "<tr>";
    echo "<td>" . date('Y-m-d', strtotime($row['fecha_cita'])) . "</td>";
    echo "<td>" . $row['hora_cita'] . "</td>";
    echo "<td>" . $row['nombres'] . " " . $row['apellidos'] . "</td>";
    echo "<td>" . $row['tipo_examen'] . "</td>";
    echo "<td class='d-none'>" . $row['tipo_documento']  . "</td>"; // Tipo de documento si lo necesitas este campo oculto para filtrar
    echo "<td class='d-none'>" . $row['numero_documento']  . "</td>"; // numero de documento si lo necesitas este campo oculto para filtrar
    echo "<td><a class='btn btn-sm btn-info' href='" . $row['orden_cita'] . "' target='_blank'>Ver</a></td>";
    echo "<td><input type='checkbox' class='form-check-input select-patient p-2' value='" . $row['id'] . "' /></td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='8'>No hay citas agendadas.</td></tr>";
}
$conn->close();

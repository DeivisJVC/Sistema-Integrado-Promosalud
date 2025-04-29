<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud2";

// Conexión a la base de datos
$conexion = mysqli_connect($servername, $username, $password, $dbname);
if (!$conexion) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

// Consulta para obtener id y nombre de las empresas
$sql = "SELECT id, nombre FROM empresa";
$result = mysqli_query($conexion, $sql);

// Generar las opciones del select
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8') . "</option>";
    }
} else {
    echo "<option value=''>No hay empresas registradas</option>";
}

mysqli_close($conexion);
?>

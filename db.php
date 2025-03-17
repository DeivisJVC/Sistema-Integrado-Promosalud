<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_integrado_promosalud";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
}
catch(PDOException $e){
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

?>
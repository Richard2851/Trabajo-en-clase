<?php
$conexion = mysqli_connect("localhost", "root", "", "comercial");

if (!$conexion) {
    die("Error en la conexion: " . mysqli_connect_error());
}

$leer = "SELECT * FROM cliente";

if (mysqli_query($conexion, $leer)) {
    echo "Lectura de datos completa";
} else {
    echo "Error en la lectura de datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
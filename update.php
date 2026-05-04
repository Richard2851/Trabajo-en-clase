<?php
$conexion = mysqli_connect("localhost", "root", "", "comercial");

if (!$conexion) {
    die("Error en la conexion: " . mysqli_connect_error());
}

$update = "UPDATE cliente SET Nombre = 'Daniel Ricardo' WHERE id_usuarios = 1";

if (mysqli_query($conexion, $update)) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
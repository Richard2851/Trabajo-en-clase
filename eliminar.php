<?php
$conexion = mysqli_connect("localhost", "root", "", "comercial");

if (!$conexion) {
    die("Error en la conexion: " . mysqli_connect_error());
}

$eliminar = "DELETE FROM cliente WHERE id_usuarios = 4";

if (mysqli_query($conexion, $eliminar)) {
    echo "Registro eliminado";
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
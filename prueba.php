<?php
    $conexion = mysqli_connect("localhost", "root", "","comercial");
    if (mysqli_connect_error()){
        die("Error en la conexion");
    }
    else{
        mysqli_close(mysqli_connect("localhost", "root", "","comercial"));
    $datos = "INSERT INTO cliente (Nombre,Apellido,Correo,Contacto) VALUES ('Darien Arley','Gomez','biggy@gmail.com','3003309876')";
    
    if (mysqli_query($conexion, $datos)){
        echo "Nuevo Registro Creado";
    }
    else{
        echo "Error al crear el registro". $datos . mysqli_error();
    }
    mysqli_close($conexion);
    }
    
?>

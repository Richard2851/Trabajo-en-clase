<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro JBRD</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<?php

$conexion = new mysqli("localhost", "root", "", "registro_jbrd");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipodoc = $_POST['tipodoc'];
    $documento = $_POST['documento'];
    $fechanac = $_POST['fechanac'];
    $fechaexp = $_POST['fechaexp'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];


    if(isset($_POST['registrar'])){

        $sql = "INSERT INTO usuarios
        (nombres, apellidos, tipodoc, documento, fecha_nacimiento, fecha_expedicion, correo, telefono)

        VALUES

        ('$nombres','$apellidos','$tipodoc','$documento','$fechanac','$fechaexp','$correo','$telefono')";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Registro guardado correctamente";
        } else {
            $mensaje = "Error: " . $conexion->error;
        }
    }


    if(isset($_POST['consultar'])){

        $sql = "SELECT * FROM usuarios WHERE documento='$documento'";

        $resultado = $conexion->query($sql);

        if($resultado->num_rows > 0){

            $fila = $resultado->fetch_assoc();

            $nombres = $fila['nombres'];
            $apellidos = $fila['apellidos'];
            $tipodoc = $fila['tipodoc'];
            $fechanac = $fila['fecha_nacimiento'];
            $fechaexp = $fila['fecha_expedicion'];
            $correo = $fila['correo'];
            $telefono = $fila['telefono'];

            $mensaje = "Usuario encontrado";

        } else {
            $mensaje = "Usuario no encontrado";
        }
    }


    if(isset($_POST['actualizar'])){

        $sql = "UPDATE usuarios SET

        nombres='$nombres',
        apellidos='$apellidos',
        tipodoc='$tipodoc',
        fecha_nacimiento='$fechanac',
        fecha_expedicion='$fechaexp',
        correo='$correo',
        telefono='$telefono'

        WHERE documento='$documento'";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Datos actualizados";
        } else {
            $mensaje = "Error al actualizar";
        }
    }


    if(isset($_POST['eliminar'])){

        $sql = "DELETE FROM usuarios WHERE documento='$documento'";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Usuario eliminado";
        } else {
            $mensaje = "Error al eliminar";
        }
    }
}

?>

<form class="contenedor" action="" method="post">

    <h2>Datos del usuario</h2>

    <p class="mensaje"><?php echo $mensaje; ?></p>

    <div class="grupo">
        <label>Nombres</label>
        <input type="text" name="nombres"
        value="<?php echo isset($nombres) ? $nombres : ''; ?>"
        placeholder="Ingrese sus nombres">
    </div>

    <div class="grupo">
        <label>Apellidos</label>
        <input type="text" name="apellidos"
        value="<?php echo isset($apellidos) ? $apellidos : ''; ?>"
        placeholder="Ingrese sus apellidos">
    </div>

    <div class="grupo">
        <label>Tipo de documento</label>

        <select name="tipodoc">

            <option value="">Seleccione</option>

            <option value="CC">CC</option>
            <option value="CE">CE</option>
            <option value="TI">TI</option>
            <option value="NIT">NIT</option>
            <option value="PAS">PAS</option>

        </select>
    </div>

    <div class="grupo">
        <label>Número de documento</label>
        <input type="text" name="documento"
        value="<?php echo isset($documento) ? $documento : ''; ?>"
        placeholder="Ingrese su documento">
    </div>

    <div class="grupo">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fechanac"
        value="<?php echo isset($fechanac) ? $fechanac : ''; ?>">
    </div>

    <div class="grupo">
        <label>Fecha de expedición</label>
        <input type="date" name="fechaexp"
        value="<?php echo isset($fechaexp) ? $fechaexp : ''; ?>">
    </div>

    <div class="grupo">
        <label>Correo electrónico</label>
        <input type="email" name="correo"
        value="<?php echo isset($correo) ? $correo : ''; ?>"
        placeholder="ejemplo@gmail.com">
    </div>

    <div class="grupo">
        <label>Contacto</label>
        <input type="text" name="telefono"
        value="<?php echo isset($telefono) ? $telefono : ''; ?>"
        placeholder="Número de teléfono">
    </div>

    <div class="botones">

        <button type="submit" name="registrar">
            Registrar
        </button>

        <button type="submit" name="consultar">
            Consultar
        </button>

        <button type="submit" name="actualizar">
            Actualizar
        </button>

        <button type="submit" name="eliminar" class="eliminar">
            Eliminar
        </button>

    </div>

</form>

</body>
</html>
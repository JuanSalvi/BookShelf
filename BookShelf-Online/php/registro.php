<?php
    include("./conexion.php");

    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $domicilio = $_POST['domicilio'];
    $cp = $_POST['cp'];
    $permisos = "cliente";


    $registro = "INSERT INTO usuario(permisos, nombre, nombre_usu, pass, telefono, correo, domicilio, cp)
                values('$permisos', '$nombre', '$usuario', '$pass', '$telefono', '$correo', '$domicilio', '$cp');";
    $insercion = mysqli_query($conn, $registro);
    
    if(!$insercion){
        echo "<script type='text/javascript'>alert('Error, No se han registrado los datos');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Se han registrado los datos');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
    }

    /*
    Destruir session
        session_destroy();
    */


?>
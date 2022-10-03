<?php
    include("./conexion.php");

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $busquedaUsuario = "SELECT * FROM usuario WHERE nombre_usu = '$usuario';";
    $consulta = mysqli_query($conn, $busquedaUsuario);
    $datos = mysqli_fetch_array($consulta);

    if($datos){
        if($datos['pass'] == $pass){
            session_start();
                $_SESSION['permisos'] = $datos['permisos'];
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['nombre_usu'] = $datos['nombre_usu'];
                $_SESSION['telefono'] = $datos['telefono'];
                $_SESSION['correo'] = $datos['correo'];
                $_SESSION['domicilio'] = $datos['domicilio'];
                $_SESSION['cp'] = $datos['cp'];
                $_SESSION['id_usuario_pk'] = $datos['id_usuario_pk'];

                header('Location:./../index.php');
        }else{
            echo "<script type='text/javascript'>alert('Contraseña Incorrecta');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../html/iniciar.html');</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Usuario no encontrado');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/iniciar.html');</script>";
    }

    /*
    Destruir session
        session_destroy();
    */


?>
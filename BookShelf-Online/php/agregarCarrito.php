<?php
    include("./conexion.php");

    $id_usu = $_POST['idusu'];
    $id_lib = $_POST['idlib'];

    //Obtener datos del libro
    $busquedaLibro = "SELECT * FROM libro WHERE id_libro_pk = '$id_lib';";
    $consultaLibro = mysqli_query($conn, $busquedaLibro);
    $datosLibro = mysqli_fetch_array($consultaLibro);

    //Obtener los datos del usuario
    $busquedaUsu = "SELECT * FROM usuario WHERE id_usuario_pk = '$id_usu';";
    $consultaUsu = mysqli_query($conn, $busquedaUsu);
    $datosUsu = mysqli_fetch_array($consultaUsu);

    $importe = $datosLibro['precio_cliente'];
    $permisos = $datosUsu['permisos'];


    //Consulta en las ordenes para comprobar que no se halla creado una orden ya
    $busquedaComprobacion= "SELECT * FROM orden WHERE id_usuario_fk = '$id_usu'  AND carrito = true;";
    $consultaComprobacion = mysqli_query($conn, $busquedaComprobacion);
    $datosOrdenComprobacion = mysqli_fetch_array($consultaComprobacion);

    if($datosOrdenComprobacion){
        $idOrden = $datosOrdenComprobacion['id_orden_pk'];

        $registroPedido = "INSERT INTO pedido(id_orden_fk, id_libro_fk, importe, cantidad)
                                        values('$idOrden', $id_lib, '$importe', 1);";
        $insercionPedido = mysqli_query($conn, $registroPedido);
        if(!$insercionPedido){
            echo "<script type='text/javascript'>alert('Error, No se han registrado los datos de pedido');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Se han registrado los datos del pedido');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
        }
        header('Location:./../html/carrito.php');
    }else{


        if($permisos == "cliente"){
            $cliente = true;
            $admin = false;
        }else{
            $cliente = false;
            $admin = true;
        }
    
        $registroOrden = "INSERT INTO orden(id_envio_retiro_fk, id_envio_mensj_fk, id_pago_tarjeta_fk, id_pago_cheque_fk,
                                 id_usuario_fk, importe_total, cantidad_total, compra_normal, compra_proveedor, carrito)
                                values(null, null, null, null, '$id_usu', 
                                        0, 0, '$cliente', '$admin', true);";
        $registroOrden = mysqli_query($conn, $registroOrden);
    
        if(!$registroOrden){
            echo "<script type='text/javascript'>alert('Error, No se han registrado los datos de orden');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Se han registrado los datos de la orden');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
        }
    
    
        $busquedaOrden = "SELECT * FROM orden WHERE id_usuario_fk = '$id_usu' AND carrito = true;";
        $consultaOrden = mysqli_query($conn, $busquedaOrden);
        $datosOrden = mysqli_fetch_array($consultaOrden);
    
        $idOrden = $datosOrden['id_orden_pk'];
    
        $registroPedido = "INSERT INTO pedido(id_orden_fk, id_libro_fk, importe, cantidad)
                                        values('$idOrden', $id_lib, '$importe', 1);";
        $insercionPedido = mysqli_query($conn, $registroPedido);
        if(!$insercionPedido){
            echo "<script type='text/javascript'>alert('Error, No se han registrado los datos de pedido');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Se han registrado los datos del pedido');</script>";
            echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
        }

        header('Location:./../html/carrito.php');
    }


 

?>
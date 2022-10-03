<?php
    include("./conexion.php");
    
    $envio = $_POST['envio'];
    $idOrd = $_POST['idOrd'];


    $busquedaOrden = "SELECT * FROM orden WHERE id_orden_pk = '$idOrd'";
    $consultaOrden = mysqli_query($conn, $busquedaOrden);
    $datosOrden = mysqli_fetch_array($consultaOrden);

    $busquedaEnvio = "SELECT * FROM envio_mensj WHERE id_envio_mensj_pk = 1;";
    $consultaEnvio = mysqli_query($conn, $busquedaEnvio);
    $datosEnvio = mysqli_fetch_array($consultaEnvio);


    if($envio == "Mensajeria"){

        $tarjeta = $_POST['tarjeta'];
        $titular = $_POST['titular'];
        $emisor = $_POST['emisor'];
        $cad = $_POST['cad'];
        $cvv = $_POST['cvv'];

        $registro = "INSERT INTO pago_tarjeta(num_tarjet, estado, fecha_cad, titular, emisor, cvv)
        values('$tarjeta', 'Pagado', '$cad', '$titular', '$emisor', '$cvv');";
        $insercion = mysqli_query($conn, $registro);

        $busquedaT = "SELECT * FROM pago_tarjeta WHERE num_tarjet = '$tarjeta';";
        $consultaT = mysqli_query($conn, $busquedaT);
        $datosT = mysqli_fetch_array($consultaT);
        $pago = $datosT['id_pago_tarjeta_pk'];

        $importe = $datosOrden['importe_total'] + $datosEnvio['costo_envio'];

        $consultaAct = "UPDATE orden SET id_envio_mensj_fk = 1, id_pago_tarjeta_fk = '$pago', carrito = false, importe_total = '$importe'
                    WHERE id_orden_pk = '$idOrd'";

        $actualizar = mysqli_query($conn, $consultaAct);

        header('Location:./../index.php');
    }else{

        $solicitante = $_POST['solicitante'];
        $cheque = $_POST['cheque'];
        $emi = $_POST['emi'];
        $pag = $_POST['pag'];
        
        $registro = " INSERT INTO pago_cheque(nombre_solicitante, numero_cheque, fecha_emision, fecha_pago, estado)
        values('$solicitante', '$cheque', '$emi', '$pag', 'Pagado');";
        $insercion = mysqli_query($conn, $registro);

        $busquedaT = "SELECT * FROM pago_cheque WHERE numero_cheque = '$cheque';";
        $consultaT = mysqli_query($conn, $busquedaT);
        $datosT = mysqli_fetch_array($consultaT);
        $pago = $datosT['id_pago_cheque_pk'];

        $consultaAct = "UPDATE orden SET id_pago_cheque_fk = '$pago', id_envio_retiro_fk = 1, carrito = false
                    WHERE id_orden_pk = '$idOrd'";
        $actualizar = mysqli_query($conn, $consultaAct);

        header('Location:./../index.php');
    }


    /*
    Destruir session
        session_destroy();
    */


?>
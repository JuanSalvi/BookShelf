
<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="estilos_globales.css">
</head>

<body>

    <!-- Cabecera -->
    <header id="cabecera">
        <!-- Barra de busqueda -->
        <div id="busqueda">
            <form action="./libros_buscados.php" method="POST" id="iniciar">

                <button id="btn_buscar" class="btn_opciones_G" type="submit">BUSCAR</button>
                <input  value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda" class="campo_busqueda_G">
                <a href="./../index.php">
                    <p id="logo_principal" class="btn_opciones_G">PAGINA PRINCIPAL</p>
                </a>
                <p id="bienvenido" class="btn_opciones_G">Bienvenido 
                    <?php  
                        error_reporting(0); 
                        $nom = $_SESSION['nombre']; 
                        if(!($nom == null || $nom == '')){
                            echo $_SESSION['nombre'];
                        }
                    ?>
                </p>
            </form>
        </div>
        <!-- Opciones de la pagina (inicio de sesion, registro) -->
        <div id="opciones">
            <form action="./carrito.php">
                 <button id="btn_carrito" class="btn_opciones_G">CARRITO</button>
            </form>
            <button id="btn_inicio" class="btn_opciones_G">Iniciar Sesion</button>
            <button id="btn_registro" class="btn_opciones_G">Registrarme</button>
            <form action="./../php/destruir.php">
                <button id="btn_cerrar" class="btn_opciones_G">Cerrar Sesion</button>
            </form>
            <button id="btn_ordenes" class="btn_opciones_G">Ordenes</button>
            <button id="btn_libros" class="btn_opciones_G">Libros</button>
        </div>
    </header>

    <!-- Contenido principal -->
    <div id="contenido">
        <div id="libros">
            
            <div id="libros_carrito">
                <table id="tabla_busqueda">
                    <tbody>
                        <?php
                            $id_usu = $_SESSION['id_usuario_pk'];

                            $busquedaOrden = "SELECT * FROM orden WHERE id_usuario_fk = '$id_usu'  AND carrito = true;";
                            $consultaOrden = mysqli_query($conn, $busquedaOrden);
                            $datosOrden = mysqli_fetch_array($consultaOrden);

                            $id_orden = $datosOrden['id_orden_pk'];
                            $busquedaPedidos = "SELECT * FROM pedido WHERE id_orden_fk = '$id_orden'";
                            $consultaPedidos = mysqli_query($conn, $busquedaPedidos);

                            while($datosPedidos = mysqli_fetch_array($consultaPedidos)){ 
                                $importe_total = $importe_total + $datosPedidos['importe'];
                                $cantidad_total = $cantidad_total + $datosPedidos['cantidad'];

                                $id_libro = $datosPedidos['id_libro_fk'];
                                $busquedaLibro = "SELECT * FROM libro WHERE id_libro_pk = '$id_libro'";
                                $consultaLibro = mysqli_query($conn, $busquedaLibro);
                                $datosLibro = mysqli_fetch_array($consultaLibro);
                                ?>
                                <tr>
                                    <td> <img src = <?php echo $datosLibro['imagen'] ?> width="100" height="154"> </td>
                                    <td> <b><?php echo $datosLibro['titulo'] ?></b> </td>
                                    <td> <?php echo $datosLibro['autor'] ?> </td>
                                    <td> <?php echo "$ " . $datosLibro['precio_cliente']; ?> </td>
                                    <td>
                                        <form action="./libro.php" method="POST" id="iniciar">
                                            <input  value=<?php echo $datosLibro['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <button id="btn_lib" class="btn_opciones_G" type="submit">Ver Titulo</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="./../php/quitarCarrito.php" method="POST" id="iniciar">
                                            <input  value=<?php echo $datosLibro['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                            <input  value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                                            <button id="btn_lib_quitar" class="btn_opciones_G" type="submit">Quitar</button>
                                        </form>
                                    </td>
                                </tr>

                        <?php 
                            }
                        
                            $consultaAct = "UPDATE orden SET importe_total = '$importe_total', cantidad_total = '$cantidad_total'
                                        WHERE id_orden_pk = '$id_orden'";
                            $actualizar = mysqli_query($conn, $consultaAct);

                        ?>
                        
                    </tbody>

                </table>
            </div>


            <div id="menu_carrito">

                <div id="total">
                    <p>Total a Pagar: <?php echo "$ " . $importe_total; ?> </p>
                </div>

                <div id="pago">
                    <form action="./pago_cheque.php" method="POST" id="iniciar">
                    <input  value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                        <button class="btn_pago" class="btn_opciones_G">PAGO CHEQUE</button>
                    </form>
                    <form action="./pago_tarjeta.php" method="POST" id="iniciar">
                        <input  value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                        <button class="btn_pago" class="btn_opciones_G">PAGO TARJETA</button>
                    </form>
                </div>



            </div>

        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="pie"></footer>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>
</html>
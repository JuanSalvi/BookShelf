<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookShelf</title>
    <link rel="stylesheet" href="./../CSS/style.css">
    <link rel="stylesheet" href="./../CSS/Carrito.css">


</head>

<body>
    <div id="Contenedor">
        <header id="Header">

            <a href="index.php"><img class="Logo" src="./../Miselaneos/BookShelf_LOGO_Blanco.png" alt=""></a>
            <button class="Boton_Busqueda" type="submit"><img class="Icono" src="./../Miselaneos/Icono_Busqueda.png"
                    alt=""></button>
            <input class="Input_Busqueda" value="" type="text" name="buscar" autocomplete="off" id="campo_busqueda"
                class="campo_busqueda_G">

            <p id="bienvenido" class="Usuario">Usuario no registrado
                <?php  
                        error_reporting(0); 
                        $nom = $_SESSION['nombre']; 
                        if(!($nom == null || $nom == '')){
                            echo $_SESSION['nombre'];
                        }
                    ?>
            </p>
            <form action="./html/Carrito.php">
                <button id="Boton_Carrito"><img src="./../Miselaneos/icons8-carrito-de-la-compra-cargado-64.png"
                        alt=""></button>
            </form>
        </header>
        <div id="Opciones">
            <button id="Boton_Inicio" class="Formato_Boton">Iniciar Sesion</button>
            <button id="Boton_Registro" class="Formato_Boton">Registrarme</button>
            <form action="./php/destruir.php">
                <button id="Boton_Cerrae" class="Formato_Boton">Cerrar Sesion</button>
            </form>
            <button id="Boton_Ordenes" class="Formato_Boton">Ordenes</button>
            <button id="Boton_Libros" class="Formato_Boton">Libros</button>
        </div>
        <!-- FIN DE HEADER -->

        <!-- DE AQUI SE ELIMINA -->

        <div id="Contenido">
            <!-- BLOQUE PARA TRABAJAR PHP -->
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
                                    <td> <img src=<?php echo $datosLibro['imagen'] ?> width="100" height="154"> </td>
                                    <td> <b>
                                            <?php echo $datosLibro['titulo'] ?>
                                        </b> </td>
                                    <td>
                                        <?php echo $datosLibro['autor'] ?>
                                    </td>
                                    <td>
                                        <?php echo "$ " . $datosLibro['precio_cliente']; ?>
                                    </td>
                                    <td>
                                        <form action="./libro.php" method="POST" id="iniciar">
                                            <input value=<?php echo $datosLibro['id_libro_pk'] ?> type="text" name="id"
                                            autocomplete="off" class = "ocultos">
                                            <button id="Boton_LibroCar" class="Formato_Botones" type="submit">Ver Titulo</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="./../php/quitarCarrito.php" method="POST" id="iniciar">
                                            <input value=<?php echo $datosLibro['id_libro_pk'] ?> type="text" name="id"
                                            autocomplete="off" class = "ocultos">
                                            <input value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd"
                                            autocomplete="off" class = "ocultos">
                                            <button id="Boton_LibroCar_Quitar   " class="Formato_Botones" type="submit">Quitar</button>
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

                <div id="Total">
                    <p>Total a Pagar: <?php echo "$ " . $importe_total; ?> </p>
                </div>

                <div id="Pago">
                    <form action="./pago_cheque.php" method="POST" id="iniciar">
                    <input  value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                        <button class="Boton_Pago" class="Formato_Botones">PAGO CHEQUE</button>
                    </form>
                    <form action="./pago_tarjeta.php" method="POST" id="iniciar">
                        <input  value=<?php echo $datosOrden['id_orden_pk'] ?> type="text" name="idOrd" autocomplete="off" class = "ocultos">
                        <button class="Boton_Pago" class="Formato_Botones">PAGO TARJETA</button>
                    </form>
                </div>

            </div>

        </div>

        <footer id="Pie_de_Pagina">
            <h2>BookShelf</h2>

        </footer>

    </div>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>

</body>

</html>
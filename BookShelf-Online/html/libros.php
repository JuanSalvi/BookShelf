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
        <link rel="stylesheet" href="./../CCS/libros.css">

    </head>

    <body>
        <div id="Contenedor">
            <header id="Header">

                <a href="index.php"><img class="Logo" src="./../Miselaneos/BookShelf_LOGO_Blanco.png" alt=""></a>
                <button class="Boton_Busqueda" type="submit"><img class="Icono" src="Miselaneos/Icono_Busqueda.png"
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
                <form action="./../html/Carrito.php">
                    <button id="Boton_Carrito"><img src="./../Miselaneos/icons8-carrito-de-la-compra-cargado-64.png"
                            alt=""></button>
                </form>
            </header>
            <div id="Opciones">
                <button id="Boton_Inicio" class="Formato_Boton">Iniciar Sesion</button>
                <button id="Boton_Registro" class="Formato_Boton">Registrarme</button>
                <form action="./../php/destruir.php">
                    <button id="Boton_Cerrae" class="Formato_Boton">Cerrar Sesion</button>
                </form>
                <button id="Boton_Ordenes" class="Formato_Boton">Ordenes</button>
                <button id="Boton_Libros" class="Formato_Boton">Libros</button>
            </div>
            <!-- FIN DE HEADER -->

            <div id="Contenido">
                <div id="Consulta">
                    <table id="tabla_busqueda">
                        <tbody>
                            <?php
    
                                $busquedaLibros = "SELECT * FROM libro;";
                                $consulta = mysqli_query($conn, $busquedaLibros);
    
                                while($datos = mysqli_fetch_array($consulta)){ ?>
                                    <tr>
                                        <td> <img src = <?php echo $datos['imagen'] ?> width="50" height="75"> </td>
                                        <td> <b><?php echo $datos['titulo'] ?></b> </td>
                                        <td> <?php echo $datos['autor'] ?> </td>
                                        <td> <?php echo $datos['editorial'] ?> </td>
                                        <td width="40px"> <?php echo $datos['edicion'] ?> </td>
                                        <td width="120px"> <?php echo $datos['publicacion'] ?> </td>
                                        <td width="120px"> <?php echo $datos['genero'] ?> </td>
                                        <td>
                                            <form action="./../libro.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                                <button id="btn_libs" class="Formato_Botones" type="submit">Ver Titulo</button>
                                            </form>
                                            
                                        </td>
                                        <td>
                                            <form action="./../php/eliminarLibro.php" method="POST" id="iniciar">
                                                <input  value=<?php echo $datos['id_libro_pk'] ?> type="text" name="id" autocomplete="off" class = "ocultos">
                                                <button id="btn_libs_red" class="Formato_Botones" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
    
                            <?php } ?>
                            
                        </tbody>
    
                    </table>
                </div>
                
            </div>
            <div class="centrar">
        <div id="agregar">
        <form action="./../php/insertarLibro.php" method="POST"  class="forms">
            <label>Titulo</label>
            <input  value="" type="text" name="titulo" autocomplete="off" require>
            <br>
            <label>Autor</label>
            <input  value="" type="text" name="autor" autocomplete="off" require>
            <br>
            <label>Editorial</label>
            <input  value="" type="text" name="editorial" autocomplete="off" require>
            <br>
            <label>Edicion</label>
            <input  value="" type="text" name="edicion" autocomplete="off" require>
            <br>
            <label>Paginas</label>
            <input  value="" type="text" name="paginas" autocomplete="off" require>
            <br>
            <label>Publicacion</label>
            <input  value="2021-01-01" type="text" name="publicacion" autocomplete="off" require>
            <br>
            <label>Genero</label>
            <input  value="" type="text" name="genero" autocomplete="off" require>
            <br>
            <label>Precio al cliente</label>
            <input  value="" type="text" name="precioc" autocomplete="off" require>
            <br>
            <label>Precio al proveedor</label>
            <input  value="" type="text" name="preciop" autocomplete="off" require>
            <br>
            <label>Disponibles</label>
            <input  value="" type="text" name="disponibles" autocomplete="off" require>
            <br>
            <label>Imagen(Enlace)</label>
            <input  value="./../Recursos/italiano.jpg" type="text" name="imagen" autocomplete="off" require>
            <br>

            <button  class="btn_forms" id="btn_libs_red" class="btn_opciones_G" type="submit">Agregar Libro</button>
        </form>
        </div>
    </div>



        </div>
        <script type="text/javascript" src="./../scripts/botones.js"></script>
    </body>

</html>
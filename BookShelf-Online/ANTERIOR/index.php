<?php include("./php/conexion.php") ?>
<?php session_start(); 

    $masVendidos = "SELECT id_libro_fk, SUM( importe ) AS total
                    FROM  pedido
                    GROUP BY id_libro_fk
                    ORDER BY total DESC LIMIT 3;";
    $consulta2 = mysqli_query($conn, $masVendidos);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookShelf</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="Contenedor">
        <header id="Header">

            <a href="index.html"><img class="Logo" src="Miselaneos/BookShelf_LOGO_Blanco.png" alt=""></a>
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
            <form action="./html/carrito.php">
                <button id="Boton_Carrito"><img src="Miselaneos/icons8-carrito-de-la-compra-cargado-64.png"
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
        <div id="Preventa"><img src="Miselaneos/Preventa.png" width="100%" alt=""></div>
        <div id="Contenido">

            <h2>Los Mas Vendidos</h2>
            <table>
                <tbody id="tabla_rec">
                    <?php
    
                            while($recomendaciones = mysqli_fetch_array($consulta2)){ 
                                $idLib = $recomendaciones['id_libro_fk'];
                                $conLibro = "SELECT * FROM libro WHERE id_libro_pk = '$idLib';";
                                $consulta3 = mysqli_query($conn, $conLibro);
                                $topVendidos = mysqli_fetch_array($consulta3)
                                
                                ?>
                    <td width="100px"> <img src=<?php echo "./php/" . $topVendidos['imagen']; ?> width="110"
                        height="160"> </td>
                    <td width="100px">
                        <?php echo $topVendidos['titulo'] ?>
                    </td>
                    <td width="100px">
                        <form action="./html/libro.php" method="POST" id="iniciar">
                            <input value=<?php echo $topVendidos['id_libro_pk'] ?> type="text" name="id"
                            autocomplete="off" class="ocultos">
                            <button class="c_btn_rec" class="btn_opciones_G" type="submit">Ver Titulo</button>
                        </form>
                    </td>

                    <?php } ?>
                </tbody>

            </table>
        </div>

        <footer id="Pie_de_Pagina">
            <h2>BookShelf</h2>
            <div Redes></div>
        </footer>

    </div>
</body>

</html>
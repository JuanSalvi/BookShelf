<?php include("./../php/conexion.php") ?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookShelf</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/Iniciar.css">

</head>

<body>
    <div id="Contenedor">
        <header id="Header">

            <a href="../index.php"><img class="Logo" src="../Miselaneos/BookShelf_LOGO_Blanco.png" alt=""></a>
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
            <form action="../html/Carrito.php">
                <button id="Boton_Carrito"><img src="../Miselaneos/Icono_Carrito.png"
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
            <div id="libros">
                <form action="./../php/iniciar.php" method="POST" class="forms">
                    <label>Usuario</label>
                    <input value="Usuario" type="text" name="usuario" autocomplete="off" required>
                    <br>
                    <label>Contraseña</label>
                    <input value="Contraseña" type="password" name="pass" required>
                    <br>
                    <button class="Boton_forms" class="btn_inSesion" class="Formato_Botones" type="submit">Iniciar</button>
                </form>
            </div>
        </div>

        <footer id="Pie_de_Pagina">
            <h2>BookShelf</h2>
            <div Redes></div>
        </footer>

    </div>
    <script type="text/javascript" src="./../scripts/botones_Global.js"></script>
</body>

</html>
<?php
    include("./conexion.php");

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $edicion = $_POST['edicion'];
    $paginas = $_POST['paginas'];
    $publicacion = $_POST['publicacion'];
    $genero = $_POST['genero'];
    $precioc = $_POST['precioc'];
    $preciop = $_POST['preciop'];
    $disponibles = $_POST['disponibles'];
    $imagen = $_POST['imagen'];

    $registro = "INSERT INTO libro(autor, titulo, editorial, edicion, paginas, publicacion,
                            genero, precio_cliente, precio_proveedor, disponibles, imagen)
                        values('$autor', '$titulo', '$editorial', '$edicion', '$paginas', '$publicacion',
                                '$genero', '$precioc', '$preciop', '$disponibles', '$imagen');";
    $insercion = mysqli_query($conn, $registro);
    
    if(!$insercion){
        echo "<script type='text/javascript'>alert('Error, No se han registrado los datos');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Se han registrado los datos');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
    }

    header('Location:./../html/libros.php');
?>
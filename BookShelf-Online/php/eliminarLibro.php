<?php
    include("./../php/conexion.php");

    $id_libro = $_POST['id'];

    $modificacion = "DELETE FROM libro WHERE id_libro_pk = '$id_libro';";
    $quitarLibro = mysqli_query($conn, $modificacion);

    if(!$quitarLibro){
        echo "<script type='text/javascript'>alert('Error, No se ha quitado el libro');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../html/registro.html');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Se ha quitado el libro');</script>";
        echo "<script type='text/javascript'>window.location.replace('./../index.php');</script>";
    }


    header('Location:./../html/libros.php');

?>
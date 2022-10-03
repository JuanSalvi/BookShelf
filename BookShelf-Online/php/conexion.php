
<?php

    $conn = mysqli_connect(
        'localhost', //Servidor
        'root', //Usuario
        '', //Contraseña
        'tienda_libros' //Base de datos
    );

    if(isset($conn)){
        //echo "BD Conectada";
    }else{
        //echo "BD NO Conectada";
    }

?>
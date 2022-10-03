
//Variables
var btn_inicio_index = document.getElementById("btn_inicio");
var btn_carrito_index = document.getElementById("btn_carrito");
var btn_registro_index = document.getElementById("btn_registro");
var btn_cerrar_index = document.getElementById("btn_cerrar");
var btn_ordenes_index = document.getElementById("btn_ordenes");
var btn_libros_index = document.getElementById("btn_libros");

//Eventos
btn_inicio_index.onclick = function(){referencia('./html/iniciar.php')};
//btn_carrito_index.onclick = function(){referencia('./html/carrito.php')};
btn_registro_index.onclick = function(){referencia('./html/registro.php')};
//btn_cerrar_index.onclick = function(){referencia('./index.php')};
btn_ordenes_index.onclick = function(){referencia('./html/ordenes.php')};
btn_libros_index.onclick = function(){referencia('./html/libros.php')};


//Funciones
function referencia(enlace){
    window.location.href = enlace;
}
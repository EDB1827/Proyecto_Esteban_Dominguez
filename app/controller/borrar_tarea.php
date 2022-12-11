<?php

$id = $_POST["id"];

$eliminar = "DELETE FROM tareas
            WHERE id = '$id'";

$resultado = mysqli_query($conexion, $eliminar);

if(!$resultado){
    echo 'Error al eliminar el producto';
} else{
    echo 'Producto eliminado con éxito';
}
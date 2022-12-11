<?php

    include('../models/tarea.php');
    include('../models/connect.php');
    include('../libraries/crear_tabla.php');


    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','correo','direccion','poblacion'
    ]; //Mostrar Tareas sin todos los campos

     // Preparar

     $tamanioPagina = 5;

     if(isset($_GET['pagina'])){

         if($_GET['pagina'] == 1){

             header('location:procesar_lista_tarea.php');
         
         }else{
         
             $pagina = $_GET['pagina'];

         }

     }else{

         $pagina = 1;

     }

     $empezarDesde = ($pagina-1) * $tamanioPagina;
    //echo "empezardesde: " . $empezarDesde . " pagina: " . $pagina . "<br>";

    $numFilas = TAREA::getNumeroTareas();
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    $registro = TAREA::getTareasPorPagina($empezarDesde, $tamanioPagina);

    include('../views/lista_tarea.php');

        for($i = 1; $i <= $totalPaginas; $i++){

            echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
        }
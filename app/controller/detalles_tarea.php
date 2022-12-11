<?php

    include('../models/tarea.php');
    include('../models/connect.php');


    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','correo','direccion','poblacion','codigo_postal',
        'provincias','estado','fecha_creacion','operario_encargado',
        'fecha_realizacion','anotaciones_ant','anotaciones_pos','arch_resumen', 'fotos'
    ]; //Mostrar Tareas si ntodos los campos

     // Preparar

     $tamanioPagina = 4;

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

    $numFilas = TAREA::getNumeroTareas();
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    $registro = TAREA::getTareasPorPagina($empezarDesde, $tamanioPagina);

    include('../views/form_detalles_tarea.php');

        for($i = 1; $i <= $totalPaginas; $i++){

            echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
        }
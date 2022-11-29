<?php

class TAREA{
        
    private function __construct(){

    }

    static function addTarea($campos, $nombres){

        
        return Connect::getInstance()->insert('tareas', $nombres, $campos);
    }
    static function getNumeroTareas(){
           
        return Connect::getInstance()->numFilas('tareas');
    }
    
    static function getTareasPorPagina($empezarDesde, $tamanioPagina){
       
        return Connect::getInstance()->resultadosPorPagina('tareas', $empezarDesde, $tamanioPagina);
    }
    
}

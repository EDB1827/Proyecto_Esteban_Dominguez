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




    function updateTareas($nombres, $campos, $id){

        $cadena = '';

        $a_campos = explode(",", $campos);

        foreach ($nombres as $valor => $contenido) {

            $cadena .= $a_campos[$valor] . " = '" .  $contenido . "' ,";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "UPDATE tareas SET " . $cadena ." WHERE id = $id";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    
    }

    

}

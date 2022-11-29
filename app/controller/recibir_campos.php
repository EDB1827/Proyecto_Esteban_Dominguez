<?php 

    $campos = $_POST;
    //unset($campos['fichero']);
    //unset($campos['foto']);
    $todocampos = $_POST;
    $campos = "";
    $names = "";
    
    foreach ($todocampos as $nam=>$camp) {
        $campos  .= $camp . ',';
        $names .= $nam . ',';
    }

    $campos2 = substr($campos, 0, -1);
    $names2 = substr($names, 0, -1);
    $a_campos = explode(",", $campos2);
    TAREA::addTarea($a_campos,$names2);
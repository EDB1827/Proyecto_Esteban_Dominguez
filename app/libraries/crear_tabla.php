<?php

function creaTabla($name, $nombreCampos, $listaValores){


    $html = '<table class="table table-bordered name="' . $name . '"><tr><thead>';

    foreach ($nombreCampos as $id => $value) :
        $html .= '<th>' . $nombreCampos[$id] . '</th>';
    endforeach;

    $html .= '</thead></tr>';

    foreach ($listaValores as $valor) :
        $html .= '<tr>';
        foreach ($nombreCampos as $id => $value) :
            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';
        endforeach;
        $html .= '<td class = "boton"> <a href = "../views/from_borrar_tarea.php">Borrar</a></td>
        <td class = "boton"> <a href = "../views/form_detalles_tarea.php">Detalles</a></td>
        <td class = "boton"> <a href = "../views/form_modificar_tarea.php">Modificar</a></td>
        </tr>';
    endforeach;
    $html .= '</table>';
    return $html;
}

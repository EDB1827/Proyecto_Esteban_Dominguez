
<?php

function crearSelect($name, $opciones, $valorDefecto = ''){
    $html = "\n" . '<select name="' . $name . '">';
    foreach ($opciones as $value => $text) {
        if ($value == $valorDefecto)
            $select = 'selected="selected"';
        else
            $select = "";
        $html .= "\n\t<option value=\"$value\" $select>$text</option>";
    }
    $html .= "\n</select>";

    return $html;
}



function valorRecibido($nombreCampo, $valorPorDefecto = '')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

function VerError($campo)
{
    global $errores;
    if (isset($errores[$campo])) {
        echo '<span style="color:red">' . $errores[$campo] . '</span>';
    }
}




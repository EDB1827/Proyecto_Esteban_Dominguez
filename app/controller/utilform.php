
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
 ?>



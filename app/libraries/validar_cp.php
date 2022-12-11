<?php
    function validar_cp($codigo)
    {
        $a = "^[0-5][1-9]{3}[0-9]$";
        if (preg_match("/$a/", $codigo)) {
            return true;
        } else {
            return false;
        }
    }
    if (empty($_POST["codigo_postal"]) || !validar_cp($codigo_postal)) {
        $errores['codigo_postal'] = 'Código Postal incorrecto';
        $hayError = TRUE;
    }
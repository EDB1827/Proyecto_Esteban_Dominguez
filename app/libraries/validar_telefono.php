<?php
    function validar_telefono($telefono)
    {
        $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
        if (preg_match("/$a/", $telefono)) {
            return true;
        } else {
            return false;
        }
    }
    if (empty($_POST["telefono"]) || !validar_telefono($telefono)) {
        $errores['telefono'] = 'Teléfono incorrecto';
        $hayError = TRUE;
    }
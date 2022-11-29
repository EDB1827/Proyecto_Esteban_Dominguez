<?php
function validar_email($correo)
    {
        $a = "#^(((([a-z\d][\.\-\+]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
        return preg_match($a, $correo);
    }

    if (empty($_POST["correo"]) || !validar_email($correo)) {
        $errores['correo'] = 'Email incorrecto';
        $hayError = TRUE;
    }

    
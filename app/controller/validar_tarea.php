<?php

include "../models/connect.php";
include "../controller/utilform.php";
include "../libraries/validar_cif.php";
include "../models/prov.php";
include "../models/user.php";
include "../models/tarea.php";
$hayError = FALSE;
$errores = [];
$fecha = date("Y-m-d");
$db = Connect::getInstance();

if (!$_POST) {
    include "../views/form_tarea.php";
} else {

    $nif_cif = $_POST['nif_cif'];
    $descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $codigo_postal = $_POST['codigo_postal'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $anotacion_anteriores = $_POST['anotaciones_ant'];
    $anotacion_posteriores = $_POST['anotaciones_pos'];




    /*Validar descripcion y Persona contacto*/

    if (empty($_POST["nombre"])) {
        $errores['nombre'] = 'Campo nombre se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["apellidos"])) {
        $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
        $hayError = TRUE;
    }

    if (empty($_POST["anotaciones_ant"])) {
        $errores['anotacion_ant'] = 'Campo anotaciones anteriores se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["anotaciones_pos"])) {
        $errores['anotaciones_pos'] = 'Campo anotaciones posteriores se encuentra vacio';
        $hayError = TRUE;
    }

    if (empty($_POST["descripcion"])) {
        $errores['descripcion'] = 'Campo descripción se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["direccion"])) {
        $errores['direccion'] = 'Campo direccion se encuentra vacio';
        $hayError = TRUE;
    }

    /*Validar NIF o CIF*/
    function validar_dni($nif_cif)
    {
        $nif_cif_sL = substr($nif_cif, 0, -1);
        $letra = substr($nif_cif, -1);
        $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
        $arLista = str_split($lista);

        if (strlen($nif_cif_sL) == 8 && is_numeric($nif_cif_sL)) {
            $resultado = (int)$nif_cif_sL % 23;
            $letraAsign = $arLista[$resultado];
            if ($letra == $letraAsign) {
                return true;
            } else {
                return false;
            }
        }
    }

    if (empty($_POST["nif_cif"]) || !validar_dni($nif_cif) && !validarCif($nif_cif)) {
        $errores['nif_cif'] = 'Nif o Cif incorrectos';
        $hayError = TRUE;
    }
    
    /*Validar Teléfono*/
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
    
    /*Validar Código Postal*/
    function validar_codigoPostal($codigo)
    {
        $a = "^[0-5][1-9]{3}[0-9]$";
        if (preg_match("/$a/", $codigo)) {
            return true;
        } else {
            return false;
        }
    }
    if (empty($_POST["codigo_postal"]) || !validar_codigoPostal($codigo_postal)) {
        $errores['codigo_postal'] = 'Código Postal incorrecto';
        $hayError = TRUE;
    }
    
    /*Validar Correo Electrónico*/

    function validar_email($correo)
    {
        $a = "#^(((([a-z\d][\.\-\+]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
        return preg_match($a, $correo);
    }

    if (empty($_POST["correo"]) || !validar_email($correo)) {
        $errores['correo'] = 'Email incorrecto';
        $hayError = TRUE;
    }

    

 /*Validar Fecha de Realización, debe tener un formato válido y ser posterior a la fecha actual. 
Se debe filtrar la fecha en el servidor para comprobar que la fecha es válida.*/


    if ($hayError) {
        include "../views/form_tarea.php";
    }else{

        include('recibir_campos.php');

    }



 

}

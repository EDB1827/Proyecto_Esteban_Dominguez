<?php 

    $descripcion = $_POST['desc'];
    $nombre = $_POST['nom'];
    $apellidos = $_POST['apl'];
    $dni = $_POST['nif'];
    $telefono = $_POST['tel'];
    $codigo = $_POST['cp'];
    $email = $_POST['email'];
    include "../models/connect.php";
    include "../controller/utilform.php";
    include "../libraries/validar_cif.php";
    include "../models/prov.php";
    include "../models/user.php";
    include "../models/tarea.php";
    include "../views/form_tarea.php";
    $db = CONNECT::getInstance();
    
    /*Validar descripcion y Persona contacto*/
 
    if(empty($nombre)){
        echo'<p>Campo nombre obligatorio</p>';
        
    }
    if(empty($apellidos)){
        echo'<p>Campo apellidos obligatorio</p>';
        
    }



    if(empty($descripcion) ){
        echo'<p>Campo descripción obligatorio</p>';
        
    }
   
    /*Validar NIF o CIF*/
    if(empty($dni) || !validar_dni($dni) && !validarCif($dni)){
        echo "<p> NIF o CIF deben ser correctos</p>";
    }
    function validar_dni($dni){
        $dnisL = substr($dni, 0, -1);
        $letra = substr($dni, -1);
        $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
        $arLista = str_split($lista);

        if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
            $resultado = (int)$dnisL % 23;
            $letraAsign = $arLista[$resultado];
            if ($letra == $letraAsign) {
                return true;
            } else {
                return false;
            }
        }
    }
    /*Validar Teléfono*/
    if(empty($telefono) || !validar_telefono($telefono)){
        echo "<p> El teléfono es incorrecto</p>";
    }
    function validar_telefono($tel)
    {
        $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
        if (preg_match("/$a/", $tel)) {
            return true;
        } else {
            return false;
        }
    }
    /*Validar Código Postal*/
    if(empty($codigo) || !validar_codigoPostal($codigo)){
        echo "<p> El código postal es incorrecto</p>";
    }
    function validar_codigoPostal($codigo){
    $a = "^[0-5][1-9]{3}[0-9]$";
    if (preg_match("/$a/", $codigo)) {
        return true;
    } else {
        return false;
    }
}
/*Validar Correo Electrónico*/

if (empty($email) || !validar_email($email)) {
    echo "<p> El correo es incorrecto</p>";
}

function validar_email($email){
    $a = "#^(((([a-z\d][\.\-\+]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
    return preg_match($a, $email);
}

/*Validar Fecha de Realización, debe tener un formato válido y ser posterior a la fecha actual. 
Se debe filtrar la fecha en el servidor para comprobar que la fecha es válida.*/







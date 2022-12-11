<?php

include("../models/connect.php");
$pdo = Connect::getInstance();

if (!$_POST) { // Si no han enviado el fomulario
    include("../views/login.php");

} else {


    $email = $_POST['correo'];
    $pass = $_POST['clave'];
    $usuario = $pdo->login($email, $pass);

    if (isset($usuario['nif'])) {
        echo "Bienvenido "  . $usuario['nif'];
        include("../views/menu.php");
    } else {
        if(isset($usuario['es_admin'])){
            echo "Bienvenido Admin ".$usuario['nombre'];
            include("../views/menu_admin.php");
        }else{
        include("../views/login.php");
    }
        
    }
    
}
<?php

include("../models/connect.php");
$pdo = Connect::getInstance();

if (!$_POST) { // Si no han enviado el fomulario
    include("../views/login.php");
    echo "hola2";
} else {
    echo "hola";

    $email = $_POST['correo'];
    $pass = $_POST['clave'];

    $usuario = $pdo->login($email, $pass);

    if (isset($usuario['nif'])) {
        echo "Bienvenido "  . $usuario['nif'];
        include("../views/menu.php");
    } else {
        include("../views/login.php");
    }
}
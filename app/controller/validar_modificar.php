<?php

include("../models/connect.php");
include("../libreries/creaSelect.php");
include("../controller/utilforms.php");

include("../models/prov.php");
include("../models/user.php");
include("../models/tarea.php");
include "../models/connect.php";
include "../controller/utilform.php";
include "../libraries/validar_cif.php";
include "../models/prov.php";
include "../models/user.php";
include "../models/tarea.php";

include("../libreria/getContenido.php");

$hayError = FALSE;
$errores = [];

if (!$_POST) { // Si no han enviado el fomulario

    $id = $_GET['id'];

    $datosTarea = TAREA::getdatosTarea($id);

    include("../views/form_modificar_tarea.php");

} else {

    if (empty($_POST["nombre"])) {
        $errores['nombre'] = 'Campo nombre se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["apellidos"])) {
        $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["descripcion"])) {
        $errores['descripcion'] = 'Campo descripción se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["codigo_postal"]) || !validarCodigoPostal($_POST["codigo_postal"])) {
        $errores['codigo_postal'] = 'Campo Codigo Postal tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["nif_cif"]) || !validarCIF($_POST["nif_cif"]) && !validarDni($_POST["nif_cif"])) {
        $errores['nif_cif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
        $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["email"]) || !validarEmail($_POST["email"])) {
        $errores['email'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }

    if ($hayError) {
        $id = $_GET['id'];
        include("../views/formularioModificarTarea.php");
    } else {
        $todos_los_campos = $_POST;

        $id = $_GET['id'];

        if ($_FILES['fichero_resumen']['name'] == "") {
            $todos_los_campos["fichero_resumen"] = "";
        } else {
            subirArchivo('fichero_resumen', $id);
            $todos_los_campos["fichero_resumen"] = "Tarea-" . $id . "-" . $_FILES['fichero_resumen']['name'];
        }

        if ($_FILES['foto_trabajo']['name'] == "") {
            $todos_los_campos["foto_trabajo"] = "";
        } else {
            subirArchivo('foto_trabajo', $id);
            $todos_los_campos["foto_trabajo"] = "Tarea-" . $id . "-" . $_FILES['foto_trabajo']['name'];
        }

        Tareas::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id);

        header("location:procesarListaTareas.php");
    }
}
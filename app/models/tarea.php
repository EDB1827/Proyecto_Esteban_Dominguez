<?php

class TAREA{
    public function __construct(){
    }
    function insert($nif, $nombre, $apellidos,$clave, $correo,$telefono, $admin1){
        $sql = "INSERT INTO tareas (cod_tarea,nif_cif,nombre,telefono,descripcion,correo,poblacion,codigoPostal,
        provincia,estado,fechaCreacion,operarioEncargado,fechaRealizacion,anotacionesAnt,anotacionesPos)
        VALUES(0,'48937837R','Víctor Martínez Domínguez','657121379','Caer muro','victor1@gmail.com','Valverde del Camino',
        '21600','Huelva','P','2022-11-21','Rafael Hinestrosa','2022-11-22','Muro en mal estado','Muro derribado')";
    $resultado = $this->db->prepare($sql);
    $resultado->execute(array());

    }
}


?>
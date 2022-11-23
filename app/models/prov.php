<?php

class PROV{
    public function __construct()
    {
    }

    /**
     * DEvuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function listaSelect()
    {
        return CONNECT::getInstance()->getListaSelect('poblacion', 'codPoblacion', 'nombre');
    }
}
?>
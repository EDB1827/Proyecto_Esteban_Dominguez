<?php

class USER{
    public function __construct()
    {
    }


    static function listaSelect()
    {
        return Connect::getInstance()->getListaSelect('usuarios', 'nif', 'nombre','WHERE es_admin = 0');
    }
}
?>
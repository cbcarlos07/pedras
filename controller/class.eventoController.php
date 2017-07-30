<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class eventoController
{
    public function insert( evento $evento ){
        require_once "../model/class.evento.php";
        $apd = new eventoDao();
        $retorno = $apd->insert( $evento );
        return $retorno;
    }

    public function update( evento $evento ){
        require_once "../model/class.evento.php";
        $apd = new eventoDao();
        $retorno = $apd->update( $evento );
        return $retorno;
    }
    public function delete( $evento ){
        require_once "../model/class.evento.php";
        $apd = new eventoDao();
        $retorno = $apd->delete( $evento );
        return $retorno;
    }
    public function getEvento ( $evento ){
        require_once "../model/class.evento.php";
        $apd = new eventoDao();
        $retorno = $apd->getEvento( $evento );
        return $retorno;
    }
    public function getListEvento ( $evento ){
        require_once "../model/class.evento.php";
        $apd = new eventoDao();
        $retorno = $apd->getListEvento( $evento );
        return $retorno;
    }
}
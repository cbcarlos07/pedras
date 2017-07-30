<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class cargoController
{
    public function insert( cargo $cargo ){
        require_once "../model/class.cargo.php";
        $apd = new cargoDao();
        $retorno = $apd->insert( $cargo );
        return $retorno;
    }

    public function update( cargo $cargo ){
        require_once "../model/class.cargo.php";
        $apd = new cargoDao();
        $retorno = $apd->update( $cargo );
        return $retorno;
    }
    public function delete( $cargo ){
        require_once "../model/class.cargo.php";
        $apd = new cargoDao();
        $retorno = $apd->delete( $cargo );
        return $retorno;
    }
    public function getCargo ( $cargo ){
        require_once "../model/class.cargo.php";
        $apd = new cargoDao();
        $retorno = $apd->getCargo( $cargo );
        return $retorno;
    }
    public function getListCargo ( $cargo ){
        require_once "../model/class.cargo.php";
        $apd = new cargoDao();
        $retorno = $apd->getListCargo( $cargo );
        return $retorno;
    }
}
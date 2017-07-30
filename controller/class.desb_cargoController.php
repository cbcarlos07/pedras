<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class desb_cargoController
{
    public function insert( desb_cargo $desb_cargo ){
        require_once "../model/class.desb_cargo.php";
        $apd = new desb_cargoDao();
        $retorno = $apd->insert( $desb_cargo );
        return $retorno;
    }

    public function update( desb_cargo $desb_cargo ){
        require_once "../model/class.desb_cargo.php";
        $apd = new desb_cargoDao();
        $retorno = $apd->update( $desb_cargo );
        return $retorno;
    }
    public function delete( $desb_cargo ){
        require_once "../model/class.desb_cargo.php";
        $apd = new desb_cargoDao();
        $retorno = $apd->delete( $desb_cargo );
        return $retorno;
    }
    public function getDesb_cargo ( $desb_cargo ){
        require_once "../model/class.desb_cargo.php";
        $apd = new desb_cargoDao();
        $retorno = $apd->getCargo( $desb_cargo );
        return $retorno;
    }
    public function getListDesb_cargo ( $desb_cargo ){
        require_once "../model/class.desb_cargo.php";
        $apd = new desb_cargoDao();
        $retorno = $apd->getListCargo( $desb_cargo );
        return $retorno;
    }
}
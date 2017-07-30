<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class ufController
{
    public function insert( uf $uf ){
        require_once "../model/class.uf.php";
        $apd = new ufDao();
        $retorno = $apd->insert( $uf );
        return $retorno;
    }

    public function update( uf $uf ){
        require_once "../model/class.uf.php";
        $apd = new ufDao();
        $retorno = $apd->update( $uf );
        return $retorno;
    }
    public function delete( $uf ){
        require_once "../model/class.uf.php";
        $apd = new ufDao();
        $retorno = $apd->delete( $uf );
        return $retorno;
    }
    public function getUf ( $uf ){
        require_once "../model/class.uf.php";
        $apd = new ufDao();
        $retorno = $apd->getUf( $uf );
        return $retorno;
    }
    public function getListUf ( $uf ){
        require_once "../model/class.uf.php";
        $apd = new ufDao();
        $retorno = $apd->getListUf( $uf );
        return $retorno;
    }
}
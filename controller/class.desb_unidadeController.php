<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class desb_unidadeController
{
    public function insert( desb_unidade $desb_unidade ){
        require_once "../model/class.desb_unidade.php";
        $apd = new desb_unidadeDao();
        $retorno = $apd->insert( $desb_unidade );
        return $retorno;
    }

    public function update( desb_unidade $desb_unidade ){
        require_once "../model/class.desb_unidade.php";
        $apd = new desb_unidadeDao();
        $retorno = $apd->update( $desb_unidade );
        return $retorno;
    }
    public function delete( $desb_unidade ){
        require_once "../model/class.desb_unidade.php";
        $apd = new desb_unidadeDao();
        $retorno = $apd->delete( $desb_unidade );
        return $retorno;
    }
    public function getUnidade ( $desb_unidade ){
        require_once "../model/class.desb_unidade.php";
        $apd = new desb_unidadeDao();
        $retorno = $apd->getUnidade( $desb_unidade );
        return $retorno;
    }
    public function getListUnidade ( $desb_unidade ){
        require_once "../model/class.desb_unidade.php";
        $apd = new desb_unidadeDao();
        $retorno = $apd->getListUnidade( $desb_unidade );
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class unidadeController
{
    public function insert( unidade $unidade ){
        require_once "../model/class.unidade.php";
        $apd = new unidadeDao();
        $retorno = $apd->insert( $unidade );
        return $retorno;
    }

    public function update( unidade $unidade ){
        require_once "../model/class.unidade.php";
        $apd = new unidadeDao();
        $retorno = $apd->update( $unidade );
        return $retorno;
    }
    public function delete( $unidade ){
        require_once "../model/class.unidade.php";
        $apd = new unidadeDao();
        $retorno = $apd->delete( $unidade );
        return $retorno;
    }
    public function getUnidade ( $unidade ){
        require_once "../model/class.unidade.php";
        $apd = new unidadeDao();
        $retorno = $apd->getUnidade( $unidade );
        return $retorno;
    }
    public function getListUnidade ( $unidade ){
        require_once "../model/class.unidade.php";
        $apd = new unidadeDao();
        $retorno = $apd->getListUnidade( $unidade );
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class anotacaoController
{
    public function insert( anotacao $anotacao ){
        require_once "../model/class.anotacao.php";
        $apd = new anotacaoDao();
        $retorno = $apd->insert( $anotacao );
        return $retorno;
    }

    public function update( anotacao $anotacao ){
        require_once "../model/class.anotacao.php";
        $apd = new anotacaoDao();
        $retorno = $apd->update( $anotacao );
        return $retorno;
    }
    public function delete( $anotacao ){
        require_once "../model/class.anotacao.php";
        $apd = new anotacaoDao();
        $retorno = $apd->delete( $anotacao );
        return $retorno;
    }
    public function getAnotacao ( $anotacao ){
        require_once "../model/class.anotacao.php";
        $apd = new anotacaoDao();
        $retorno = $apd->getAnotacao( $anotacao );
        return $retorno;
    }
    public function getListAnotacao ( $anotacao ){
        require_once "../model/class.anotacao.php";
        $apd = new anotacaoDao();
        $retorno = $apd->getListAnotacao( $anotacao );
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class anotacao_pgtoController
{
    public function insert( anotacao_pgto $anotacao_pgto ){
        require_once "../model/class.anotacao_pgto.php";
        $apd = new anotacao_pgtoDao();
        $retorno = $apd->insert( $anotacao_pgto );
        return $retorno;
    }

    public function update( anotacao_pgto $anotacao_pgto ){
        require_once "../model/class.anotacao_pgto.php";
        $apd = new anotacao_pgtoDao();
        $retorno = $apd->update( $anotacao_pgto );
        return $retorno;
    }
    public function delete( $anotacao_pgto ){
        require_once "../model/class.anotacao_pgto.php";
        $apd = new anotacao_pgtoDao();
        $retorno = $apd->delete( $anotacao_pgto );
        return $retorno;
    }
    public function getAnotacao ( $anotacao_pgto ){
        require_once "../model/class.anotacao_pgto.php";
        $apd = new anotacao_pgtoDao();
        $retorno = $apd->getAnotacao( $anotacao_pgto );
        return $retorno;
    }
    public function getListAnotacao ( $anotacao_pgto ){
        require_once "../model/class.anotacao_pgto.php";
        $apd = new anotacao_pgtoDao();
        $retorno = $apd->getListAnotacao( $anotacao_pgto );
        return $retorno;
    }
}
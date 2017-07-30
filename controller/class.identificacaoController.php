<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class identificacaoController
{
    public function insert( identificacao $identificacao ){
        require_once "../model/class.identificacao.php";
        $apd = new identificacaoDao();
        $retorno = $apd->insert( $identificacao );
        return $retorno;
    }

    public function update( identificacao $identificacao ){
        require_once "../model/class.identificacao.php";
        $apd = new identificacaoDao();
        $retorno = $apd->update( $identificacao );
        return $retorno;
    }
    public function delete( $identificacao ){
        require_once "../model/class.identificacao.php";
        $apd = new identificacaoDao();
        $retorno = $apd->delete( $identificacao );
        return $retorno;
    }
    public function getIdentificacao ( $identificacao ){
        require_once "../model/class.identificacao.php";
        $apd = new identificacaoDao();
        $retorno = $apd->getIdentificacao( $identificacao );
        return $retorno;
    }
    public function getListIdentificacao ( $identificacao ){
        require_once "../model/class.identificacao.php";
        $apd = new identificacaoDao();
        $retorno = $apd->getListIdentificacao( $identificacao );
        return $retorno;
    }
}
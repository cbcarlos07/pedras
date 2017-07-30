<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class filiacaoController
{
    public function insert( filiacao $filiacao ){
        require_once "../model/class.filiacao.php";
        $apd = new filiacaoDao();
        $retorno = $apd->insert( $filiacao );
        return $retorno;
    }

    public function update( filiacao $filiacao ){
        require_once "../model/class.filiacao.php";
        $apd = new filiacaoDao();
        $retorno = $apd->update( $filiacao );
        return $retorno;
    }
    public function delete( $filiacao ){
        require_once "../model/class.filiacao.php";
        $apd = new filiacaoDao();
        $retorno = $apd->delete( $filiacao );
        return $retorno;
    }
    public function getFiliacao ( $filiacao ){
        require_once "../model/class.filiacao.php";
        $apd = new filiacaoDao();
        $retorno = $apd->getFiliacao( $filiacao );
        return $retorno;
    }
    public function getListFiliacao (  ){
        require_once "../model/class.filiacao.php";
        $apd = new filiacaoDao();
        $retorno = $apd->getListFiliacao(  );
        return $retorno;
    }
}
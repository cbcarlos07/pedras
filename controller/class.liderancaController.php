<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class liderancaController
{
    public function insert( lideranca $lideranca ){
        require_once "../model/class.lideranca.php";
        $apd = new liderancaDao();
        $retorno = $apd->insert( $lideranca );
        return $retorno;
    }

    public function update( lideranca $lideranca ){
        require_once "../model/class.lideranca.php";
        $apd = new liderancaDao();
        $retorno = $apd->update( $lideranca );
        return $retorno;
    }
    public function delete( $lideranca ){
        require_once "../model/class.lideranca.php";
        $apd = new liderancaDao();
        $retorno = $apd->delete( $lideranca );
        return $retorno;
    }
    public function getLideranca ( $lideranca ){
        require_once "../model/class.lideranca.php";
        $apd = new liderancaDao();
        $retorno = $apd->getLideranca( $lideranca );
        return $retorno;
    }
    public function getListLideranca (  ){
        require_once "../model/class.lideranca.php";
        $apd = new liderancaDao();
        $retorno = $apd->getListLideranca(  );
        return $retorno;
    }
}
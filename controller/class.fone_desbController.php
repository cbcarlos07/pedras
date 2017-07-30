<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class fone_desbController
{
    public function insert( fone_desb $fone_desb ){
        require_once "../model/class.fone_desb.php";
        $apd = new fone_desbDao();
        $retorno = $apd->insert( $fone_desb );
        return $retorno;
    }

    public function update( fone_desb $fone_desb ){
        require_once "../model/class.fone_desb.php";
        $apd = new fone_desbDao();
        $retorno = $apd->update( $fone_desb );
        return $retorno;
    }
    public function delete( $fone_desb ){
        require_once "../model/class.fone_desb.php";
        $apd = new fone_desbDao();
        $retorno = $apd->delete( $fone_desb );
        return $retorno;
    }
    public function getFone_desb ( $fone_desb ){
        require_once "../model/class.fone_desb.php";
        $apd = new fone_desbDao();
        $retorno = $apd->getFone( $fone_desb );
        return $retorno;
    }
    public function getListFone_desb (  ){
        require_once "../model/class.fone_desb.php";
        $apd = new fone_desbDao();
        $retorno = $apd->getListFone(  );
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class pgto_desbController
{
    public function insert( pgto_desb $pgto_desb ){
        require_once "../model/class.pgto_desb.php";
        $apd = new pgto_desbDao();
        $retorno = $apd->insert( $pgto_desb );
        return $retorno;
    }

    public function update( pgto_desb $pgto_desb ){
        require_once "../model/class.pgto_desb.php";
        $apd = new pgto_desbDao();
        $retorno = $apd->update( $pgto_desb );
        return $retorno;
    }
    public function delete( $pgto_desb ){
        require_once "../model/class.pgto_desb.php";
        $apd = new pgto_desbDao();
        $retorno = $apd->delete( $pgto_desb );
        return $retorno;
    }
    public function getPgto_desb ( $pgto_desb ){
        require_once "../model/class.pgto_desb.php";
        $apd = new pgto_desbDao();
        $retorno = $apd->getPgto_desb( $pgto_desb );
        return $retorno;
    }
    public function getListPgto_desb (  ){
        require_once "../model/class.pgto_desb.php";
        $apd = new pgto_desbDao();
        $retorno = $apd->getListPgto_desb(  );
        return $retorno;
    }
}
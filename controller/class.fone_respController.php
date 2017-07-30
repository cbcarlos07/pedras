<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class fone_respController
{
    public function insert( fone_resp $fone_resp ){
        require_once "../model/class.fone_resp.php";
        $apd = new fone_respDao();
        $retorno = $apd->insert( $fone_resp );
        return $retorno;
    }

    public function update( fone_resp $fone_resp ){
        require_once "../model/class.fone_resp.php";
        $apd = new fone_respDao();
        $retorno = $apd->update( $fone_resp );
        return $retorno;
    }
    public function delete( $fone_resp ){
        require_once "../model/class.fone_resp.php";
        $apd = new fone_respDao();
        $retorno = $apd->delete( $fone_resp );
        return $retorno;
    }
    public function getFone_resp ( $fone_resp ){
        require_once "../model/class.fone_resp.php";
        $apd = new fone_respDao();
        $retorno = $apd->getFone( $fone_resp );
        return $retorno;
    }
    public function getListFone_resp (  ){
        require_once "../model/class.fone_resp.php";
        $apd = new fone_respDao();
        $retorno = $apd->getListFone(  );
        return $retorno;
    }
}
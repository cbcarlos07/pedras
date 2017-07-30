<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class espec_desbController
{
    public function insert( espec_desb $espec_desb ){
        require_once "../model/class.espec_desb.php";
        $apd = new espec_desbDao();
        $retorno = $apd->insert( $espec_desb );
        return $retorno;
    }

    public function update( espec_desb $espec_desb ){
        require_once "../model/class.espec_desb.php";
        $apd = new espec_desbDao();
        $retorno = $apd->update( $espec_desb );
        return $retorno;
    }
    public function delete( $espec, $desb ){
        require_once "../model/class.espec_desb.php";
        $apd = new espec_desbDao();
        $retorno = $apd->delete( $espec, $desb );
        return $retorno;
    }
    public function getEspecialidade( $espec, $desb  ){
        require_once "../model/class.espec_desb.php";
        $apd = new espec_desbDao();
        $retorno = $apd->getEspecialidade( $espec, $desb );
        return $retorno;
    }
    public function getListEspecialidade ( $espec ){
        require_once "../model/class.espec_desb.php";
        $apd = new espec_desbDao();
        $retorno = $apd->getListEspecialidades( $espec );
        return $retorno;
    }
}
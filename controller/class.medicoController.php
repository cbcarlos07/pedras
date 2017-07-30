<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class medicoController
{
    public function insert( medico $medico ){
        require_once "../model/class.medico.php";
        $apd = new medicoDao();
        $retorno = $apd->insert( $medico );
        return $retorno;
    }

    public function update( medico $medico ){
        require_once "../model/class.medico.php";
        $apd = new medicoDao();
        $retorno = $apd->update( $medico );
        return $retorno;
    }
    public function delete( $medico ){
        require_once "../model/class.medico.php";
        $apd = new medicoDao();
        $retorno = $apd->delete( $medico );
        return $retorno;
    }
    public function getMedico ( $medico ){
        require_once "../model/class.medico.php";
        $apd = new medicoDao();
        $retorno = $apd->getMedico( $medico );
        return $retorno;
    }
    public function getListMedico ( $medico ){
        require_once "../model/class.medico.php";
        $apd = new medicoDao();
        $retorno = $apd->getListMedico( $medico );
        return $retorno;
    }
}
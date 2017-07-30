<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class responsavelController
{
    public function insert( responsavel $responsavel ){
        require_once "../model/class.responsavel.php";
        $apd = new responsavelDao();
        $retorno = $apd->insert( $responsavel );
        return $retorno;
    }

    public function update( responsavel $responsavel ){
        require_once "../model/class.responsavel.php";
        $apd = new responsavelDao();
        $retorno = $apd->update( $responsavel );
        return $retorno;
    }
    public function delete( $responsavel ){
        require_once "../model/class.responsavel.php";
        $apd = new responsavelDao();
        $retorno = $apd->delete( $responsavel );
        return $retorno;
    }
    public function getResponsavel ( $responsavel ){
        require_once "../model/class.responsavel.php";
        $apd = new responsavelDao();
        $retorno = $apd->getResponsavel( $responsavel );
        return $retorno;
    }
    public function getListResponsavel ( $responsavel ){
        require_once "../model/class.responsavel.php";
        $apd = new responsavelDao();
        $retorno = $apd->getListResponsavel( $responsavel );
        return $retorno;
    }
}
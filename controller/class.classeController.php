<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class classeController
{
    public function insert( classe $classe ){
        require_once "../model/class.classe.php";
        $apd = new classeDao();
        $retorno = $apd->insert( $classe );
        return $retorno;
    }

    public function update( classe $classe ){
        require_once "../model/class.classe.php";
        $apd = new classeDao();
        $retorno = $apd->update( $classe );
        return $retorno;
    }
    public function delete( $classe ){
        require_once "../model/class.classe.php";
        $apd = new classeDao();
        $retorno = $apd->delete( $classe );
        return $retorno;
    }
    public function getClasse ( $classe ){
        require_once "../model/class.classe.php";
        $apd = new classeDao();
        $retorno = $apd->getClasse( $classe );
        return $retorno;
    }
    public function getListClasse ( $classe ){
        require_once "../model/class.classe.php";
        $apd = new classeDao();
        $retorno = $apd->getListClasse( $classe );
        return $retorno;
    }
}
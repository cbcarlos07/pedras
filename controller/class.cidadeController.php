<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class cidadeController
{
    public function insert( cidade $cidade ){
        require_once "../model/class.cidade.php";
        $apd = new cidadeDao();
        $retorno = $apd->insert( $cidade );
        return $retorno;
    }

    public function update( cidade $cidade ){
        require_once "../model/class.cidade.php";
        $apd = new cidadeDao();
        $retorno = $apd->update( $cidade );
        return $retorno;
    }
    public function delete( $cidade ){
        require_once "../model/class.cidade.php";
        $apd = new cidadeDao();
        $retorno = $apd->delete( $cidade );
        return $retorno;
    }
    public function getCidade ( $cidade ){
        require_once "../model/class.cidade.php";
        $apd = new cidadeDao();
        $retorno = $apd->getCidade( $cidade );
        return $retorno;
    }
    public function getListCidade ( $cidade ){
        require_once "../model/class.cidade.php";
        $apd = new cidadeDao();
        $retorno = $apd->getListCidade( $cidade );
        return $retorno;
    }
}
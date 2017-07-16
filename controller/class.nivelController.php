<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 15:59
 */
class nivelController
{
    public function insert( nivel $nivel ){
        require_once "../dao/class.nivelDao.php";
        $nd = new nivelDao();
        $retorno = $nd->insert( $nivel );
        return $retorno;
    }

    public function update( nivel $nivel ){
        require_once "../dao/class.nivelDao.php";
        $nd = new nivelDao();
        $retorno = $nd->update( $nivel );
        return $retorno;
    }

    public function delete( $nivel ){
        require_once "../dao/class.nivelDao.php";
        $nd = new nivelDao();
        $retorno = $nd->delete( $nivel );
        return $retorno;
    }

    public function getNivel ( $nivel ){
        require_once "../dao/class.nivelDao.php";
        $nd = new nivelDao();
        $retorno = $nd->getNivel( $nivel );
        return $retorno;
    }

    public function getListNivel ( $nivel ){
        require_once "../dao/class.nivelDao.php";
        $nd = new nivelDao();
        $retorno = $nd->getListNivel( $nivel );
        return $retorno;
    }
}
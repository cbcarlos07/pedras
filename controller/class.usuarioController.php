<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:07
 */
class usuarioController
{
    public function insert( usuario $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->insert( $usuario );
        return $retorno;
    }

    public function update( usuario $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->update( $usuario );
        return $retorno;
    }

    public function updateSenha( usuario $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->updateSenha( $usuario );
        return $retorno;
    }

    public function delete( $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->delete( $usuario );
        return $retorno;
    }

    public function getUsuario ( $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->getUsuario( $usuario );
        return $retorno;
    }

    public function getListNivel ( $usuario ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->getListNivel( $usuario );
        return $retorno;
    }

    public function loginUser ( $usuario, $senha ){
        require_once "../dao/class.usuarioDao.php";
        $ud = new usuarioDao();
        $retorno = $ud->loginUser( $usuario, $senha );
        return $retorno;
    }


}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class projetoController
{
    public function insert( projeto $projeto ){
        require_once "../model/class.projeto.php";
        $apd = new projetoDao();
        $retorno = $apd->insert( $projeto );
        return $retorno;
    }

    public function update( projeto $projeto ){
        require_once "../model/class.projeto.php";
        $apd = new projetoDao();
        $retorno = $apd->update( $projeto );
        return $retorno;
    }
    public function delete( $projeto ){
        require_once "../model/class.projeto.php";
        $apd = new projetoDao();
        $retorno = $apd->delete( $projeto );
        return $retorno;
    }
    public function getProjeto ( $projeto ){
        require_once "../model/class.projeto.php";
        $apd = new projetoDao();
        $retorno = $apd->getProjeto( $projeto );
        return $retorno;
    }
    public function getListProjeto ( $projeto ){
        require_once "../model/class.projeto.php";
        $apd = new projetoDao();
        $retorno = $apd->getListProjeto( $projeto );
        return $retorno;
    }
}
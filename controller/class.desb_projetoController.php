<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class desb_projetoController
{
    public function insert( desb_projeto $desb_projeto ){
        require_once "../model/class.desb_projeto.php";
        $apd = new desb_projetoDao();
        $retorno = $apd->insert( $desb_projeto );
        return $retorno;
    }

    public function update( desb_projeto $desb_projeto ){
        require_once "../model/class.desb_projeto.php";
        $apd = new desb_projetoDao();
        $retorno = $apd->update( $desb_projeto );
        return $retorno;
    }
    public function delete( $desb_projeto ){
        require_once "../model/class.desb_projeto.php";
        $apd = new desb_projetoDao();
        $retorno = $apd->delete( $desb_projeto );
        return $retorno;
    }
    public function getDesb_projeto ( $desb_projeto ){
        require_once "../model/class.desb_projeto.php";
        $apd = new desb_projetoDao();
        $retorno = $apd->getProjeto( $desb_projeto );
        return $retorno;
    }
    public function getListDesb_projeto ( $desb_projeto ){
        require_once "../model/class.desb_projeto.php";
        $apd = new desb_projetoDao();
        $retorno = $apd->getListProjeto( $desb_projeto );
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class cursoController
{
    public function insert( curso $curso ){
        require_once "../model/class.curso.php";
        $apd = new cursoDao();
        $retorno = $apd->insert( $curso );
        return $retorno;
    }

    public function update( curso $curso ){
        require_once "../model/class.curso.php";
        $apd = new cursoDao();
        $retorno = $apd->update( $curso );
        return $retorno;
    }
    public function delete( $curso ){
        require_once "../model/class.curso.php";
        $apd = new cursoDao();
        $retorno = $apd->delete( $curso );
        return $retorno;
    }
    public function getCurso ( $curso ){
        require_once "../model/class.curso.php";
        $apd = new cursoDao();
        $retorno = $apd->getCurso( $curso );
        return $retorno;
    }
    public function getListCurso ( $curso ){
        require_once "../model/class.curso.php";
        $apd = new cursoDao();
        $retorno = $apd->getListCurso( $curso );
        return $retorno;
    }
}
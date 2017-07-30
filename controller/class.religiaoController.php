<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class religiaoController
{
    public function insert( religiao $religiao ){
        require_once "../model/class.religiao.php";
        $apd = new religiaoDao();
        $retorno = $apd->insert( $religiao );
        return $retorno;
    }

    public function update( religiao $religiao ){
        require_once "../model/class.religiao.php";
        $apd = new religiaoDao();
        $retorno = $apd->update( $religiao );
        return $retorno;
    }
    public function delete( $religiao ){
        require_once "../model/class.religiao.php";
        $apd = new religiaoDao();
        $retorno = $apd->delete( $religiao );
        return $retorno;
    }
    public function getReligiao ( $religiao ){
        require_once "../model/class.religiao.php";
        $apd = new religiaoDao();
        $retorno = $apd->getReligiao( $religiao );
        return $retorno;
    }
    public function getListReligiao ( $religiao ){
        require_once "../model/class.religiao.php";
        $apd = new religiaoDao();
        $retorno = $apd->getListReligiao( $religiao );
        return $retorno;
    }
}
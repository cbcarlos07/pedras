<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class desbravadorController
{
    public function insert( desbravador $desbravador ){
        require_once "../model/class.desbravador.php";
        $apd = new desbravadorDao();
        $retorno = $apd->insert( $desbravador );
        return $retorno;
    }

    public function update( desbravador $desbravador ){
        require_once "../model/class.desbravador.php";
        $apd = new desbravadorDao();
        $retorno = $apd->update( $desbravador );
        return $retorno;
    }
    public function delete( $desbravador ){
        require_once "../model/class.desbravador.php";
        $apd = new desbravadorDao();
        $retorno = $apd->delete( $desbravador );
        return $retorno;
    }
    public function getDesbravador ( $desbravador ){
        require_once "../model/class.desbravador.php";
        $apd = new desbravadorDao();
        $retorno = $apd->getDesbravador( $desbravador );
        return $retorno;
    }
    public function getListDesbravador ( $desbravador ){
        require_once "../model/class.desbravador.php";
        $apd = new desbravadorDao();
        $retorno = $apd->getListDesbravador( $desbravador );
        return $retorno;
    }
}
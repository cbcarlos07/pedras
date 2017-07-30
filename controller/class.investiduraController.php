<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class investiduraController
{
    public function insert( investidura $investidura ){
        require_once "../model/class.investidura.php";
        $apd = new investiduraDao();
        $retorno = $apd->insert( $investidura );
        return $retorno;
    }

    public function update( investidura $investidura ){
        require_once "../model/class.investidura.php";
        $apd = new investiduraDao();
        $retorno = $apd->update( $investidura );
        return $retorno;
    }
    public function delete( $investidura ){
        require_once "../model/class.investidura.php";
        $apd = new investiduraDao();
        $retorno = $apd->delete( $investidura );
        return $retorno;
    }
    public function getInvestidura ( $investidura ){
        require_once "../model/class.investidura.php";
        $apd = new investiduraDao();
        $retorno = $apd->getInvestidura( $investidura );
        return $retorno;
    }
    public function getListInvestidura (  ){
        require_once "../model/class.investidura.php";
        $apd = new investiduraDao();
        $retorno = $apd->getListInvestidura(  );
        return $retorno;
    }
}
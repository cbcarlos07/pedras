<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class despesaController
{
    public function insert( despesa $despesa ){
        require_once "../model/class.despesa.php";
        $apd = new despesaDao();
        $retorno = $apd->insert( $despesa );
        return $retorno;
    }

    public function update( despesa $despesa ){
        require_once "../model/class.despesa.php";
        $apd = new despesaDao();
        $retorno = $apd->update( $despesa );
        return $retorno;
    }
    public function delete( $despesa ){
        require_once "../model/class.despesa.php";
        $apd = new despesaDao();
        $retorno = $apd->delete( $despesa );
        return $retorno;
    }
    public function getDespesa ( $despesa ){
        require_once "../model/class.despesa.php";
        $apd = new despesaDao();
        $retorno = $apd->getDespesa( $despesa );
        return $retorno;
    }
    public function getListDespesa (  ){
        require_once "../model/class.despesa.php";
        $apd = new despesaDao();
        $retorno = $apd->getListDespesa(  );
        return $retorno;
    }
}
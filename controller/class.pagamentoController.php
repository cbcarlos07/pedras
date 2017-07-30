<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class pagamentoController
{
    public function insert( pagamento $pagamento ){
        require_once "../model/class.pagamento.php";
        $apd = new pagamentoDao();
        $retorno = $apd->insert( $pagamento );
        return $retorno;
    }

    public function update( pagamento $pagamento ){
        require_once "../model/class.pagamento.php";
        $apd = new pagamentoDao();
        $retorno = $apd->update( $pagamento );
        return $retorno;
    }
    public function delete( $pagamento ){
        require_once "../model/class.pagamento.php";
        $apd = new pagamentoDao();
        $retorno = $apd->delete( $pagamento );
        return $retorno;
    }
    public function getPagamento ( $pagamento ){
        require_once "../model/class.pagamento.php";
        $apd = new pagamentoDao();
        $retorno = $apd->getPagamento( $pagamento );
        return $retorno;
    }
    public function getListPagamento (  ){
        require_once "../model/class.pagamento.php";
        $apd = new pagamentoDao();
        $retorno = $apd->getListPagamento(  );
        return $retorno;
    }
}
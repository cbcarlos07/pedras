<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 22/07/17
 * Time: 21:44
 */
class anotacao_pgto
{
    private $anotacao;
    private $nrValor;
    private $dtPgto;

    /**
     * @return mixed
     */
    public function getAnotacao()
    {
        return $this->anotacao;
    }

    /**
     * @param mixed $anotacao
     * @return anotacao_pgto
     */
    public function setAnotacao($anotacao)
    {
        $this->anotacao = $anotacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrValor()
    {
        return $this->nrValor;
    }

    /**
     * @param mixed $nrValor
     * @return anotacao_pgto
     */
    public function setNrValor($nrValor)
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtPgto()
    {
        return $this->dtPgto;
    }

    /**
     * @param mixed $dtPgto
     * @return anotacao_pgto
     */
    public function setDtPgto($dtPgto)
    {
        $this->dtPgto = $dtPgto;
        return $this;
    }


}
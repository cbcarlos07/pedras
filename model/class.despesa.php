<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 22/07/17
 * Time: 21:36
 */
class despesa
{
    private $pgto_desb;
    private $nrValor;
    private $dsDespesa;

    /**
     * @return mixed
     */
    public function getPgtoDesb()
    {
        return $this->pgto_desb;
    }

    /**
     * @param mixed $pgto_desb
     * @return despesa
     */
    public function setPgtoDesb($pgto_desb)
    {
        $this->pgto_desb = $pgto_desb;
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
     * @return despesa
     */
    public function setNrValor($nrValor)
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsDespesa()
    {
        return $this->dsDespesa;
    }

    /**
     * @param mixed $dsDespesa
     * @return despesa
     */
    public function setDsDespesa($dsDespesa)
    {
        $this->dsDespesa = $dsDespesa;
        return $this;
    }




}
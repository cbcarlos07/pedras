<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:23
 */
class evento
{
    private $cdEvento;
    private $dsEvento;
    private $precoPessoa;

    /**
     * @return mixed
     */
    public function getCdEvento()
    {
        return $this->cdEvento;
    }

    /**
     * @param mixed $cdEvento
     * @return evento
     */
    public function setCdEvento($cdEvento)
    {
        $this->cdEvento = $cdEvento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEvento()
    {
        return $this->dsEvento;
    }

    /**
     * @param mixed $dsEvento
     * @return evento
     */
    public function setDsEvento($dsEvento)
    {
        $this->dsEvento = $dsEvento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecoPessoa()
    {
        return $this->precoPessoa;
    }

    /**
     * @param mixed $precoPessoa
     * @return evento
     */
    public function setPrecoPessoa($precoPessoa)
    {
        $this->precoPessoa = $precoPessoa;
        return $this;
    }

}
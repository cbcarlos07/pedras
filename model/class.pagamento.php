<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 18:02
 */
class pagamento
{
  private $desbravador;
  private $evento;
  private $nrValor;
  private $dtPgto;

    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return pagamento
     */
    public function setDesbravador($desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * @param mixed $evento
     * @return pagamento
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;
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
     * @return pagamento
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
     * @return pagamento
     */
    public function setDtPgto($dtPgto)
    {
        $this->dtPgto = $dtPgto;
        return $this;
    }

}
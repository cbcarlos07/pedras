<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 18:12
 */
class pgto_desb
{
  private $cdPgto;
  private $desbravador;
  private $evento;

    /**
     * @return mixed
     */
    public function getCdPgto()
    {
        return $this->cdPgto;
    }

    /**
     * @param mixed $cdPgto
     * @return pgto_desb
     */
    public function setCdPgto($cdPgto)
    {
        $this->cdPgto = $cdPgto;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return pgto_desb
     */
    public function setDesbravador( desbravador $desbravador)
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
     * @return pgto_desb
     */
    public function setEvento( evento $evento)
    {
        $this->evento = $evento;
        return $this;
    }

}
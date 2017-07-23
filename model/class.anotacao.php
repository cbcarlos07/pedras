<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 22/07/17
 * Time: 21:36
 */
class anotacao
{
  private  $cdAnotacao;
  private  $desbravador;
  private  $nrValor;
  private  $obsAnotacao;

    /**
     * @return mixed
     */
    public function getCdAnotacao()
    {
        return $this->cdAnotacao;
    }

    /**
     * @param mixed $cdAnotacao
     * @return anotacao
     */
    public function setCdAnotacao($cdAnotacao)
    {
        $this->cdAnotacao = $cdAnotacao;
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
     * @return anotacao
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
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
     * @return anotacao
     */
    public function setNrValor($nrValor)
    {
        $this->nrValor = $nrValor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsAnotacao()
    {
        return $this->obsAnotacao;
    }

    /**
     * @param mixed $obsAnotacao
     * @return anotacao
     */
    public function setObsAnotacao($obsAnotacao)
    {
        $this->obsAnotacao = $obsAnotacao;
        return $this;
    }


}
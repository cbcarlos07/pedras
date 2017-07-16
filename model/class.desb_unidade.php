<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:08
 */
class desb_unidade
{
  private $unidade;
  private $desbravador;

    /**
     * @return mixed
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * @param mixed $unidade
     * @return desb_unidade
     */
    public function setUnidade( unidade $unidade)
    {
        $this->unidade = $unidade;
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
     * @return desb_unidade
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }


}
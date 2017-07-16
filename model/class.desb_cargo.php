<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:07
 */
class desb_cargo
{
 private $cargo;
 private $desbravador;

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     * @return desb_cargo
     */
    public function setCargo(  cargo $cargo)
    {
        $this->cargo = $cargo;
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
     * @return desb_cargo
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }


}
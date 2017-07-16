<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:10
 */
class filiacao
{
    private $cdFiliacao;
    private $desbravador;
    private $responsavel;

    /**
     * @return mixed
     */
    public function getCdFiliacao()
    {
        return $this->cdFiliacao;
    }

    /**
     * @param mixed $cdFiliacao
     * @return filiacao
     */
    public function setCdFiliacao($cdFiliacao)
    {
        $this->cdFiliacao = $cdFiliacao;
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
     * @return filiacao
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * @param mixed $responsavel
     * @return filiacao
     */
    public function setResponsavel( responsavel $responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }

}
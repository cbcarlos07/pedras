<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:48
 */
class investidura
{
    private $desbravador;
    private $classe;
    private $dtInvestidura;
    private $imgCertificado;

    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return investidura
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     * @return investidura
     */
    public function setClasse( classe $classe)
    {
        $this->classe = $classe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtInvestidura()
    {
        return $this->dtInvestidura;
    }

    /**
     * @param mixed $dtInvestidura
     * @return investidura
     */
    public function setDtInvestidura($dtInvestidura)
    {
        $this->dtInvestidura = $dtInvestidura;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImgCertificado()
    {
        return $this->imgCertificado;
    }

    /**
     * @param mixed $imgCertificado
     * @return investidura
     */
    public function setImgCertificado($imgCertificado)
    {
        $this->imgCertificado = $imgCertificado;
        return $this;
    }

}
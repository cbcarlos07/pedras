<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:50
 */
class lideranca
{
    private $desbravador;
    private $curso;
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
     * @return lideranca
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @param mixed $curso
     * @return lideranca
     */
    public function setCurso( curso $curso)
    {
        $this->curso = $curso;
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
     * @return lideranca
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
     * @return lideranca
     */
    public function setImgCertificado($imgCertificado)
    {
        $this->imgCertificado = $imgCertificado;
        return $this;
    }



}
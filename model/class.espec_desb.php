<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:09
 */
class espec_desb
{
    private $especialidade;
    private $imgCertificado;
    private $desbravador;

    /**
     * @return mixed
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @param mixed $especialidade
     * @return espec_desb
     */
    public function setEspecialidade($especialidade)
    {
        $this->especialidade = $especialidade;
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
     * @return espec_desb
     */
    public function setImgCertificado($imgCertificado)
    {
        $this->imgCertificado = $imgCertificado;
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
     * @return espec_desb
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

}
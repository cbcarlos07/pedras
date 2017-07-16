<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:05
 */
class desbravador
{
    private $cdDesb;
    private $nmDesbravador;
    private $dsSexo;
    private $cidade;
    private $snBatizado;
    private $religiao;
    private $snRecebeuLenco;
    private $dtRecebeuLenco;
    private $dsFoto;
    private $nrCep;
    private $dsEmail;
    private $snAtivo;

    /**
     * @return mixed
     */
    public function getCdDesb()
    {
        return $this->cdDesb;
    }

    /**
     * @param mixed $cdDesb
     * @return desbravador
     */
    public function setCdDesb($cdDesb)
    {
        $this->cdDesb = $cdDesb;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmDesbravador()
    {
        return $this->nmDesbravador;
    }

    /**
     * @param mixed $nmDesbravador
     * @return desbravador
     */
    public function setNmDesbravador($nmDesbravador)
    {
        $this->nmDesbravador = $nmDesbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsSexo()
    {
        return $this->dsSexo;
    }

    /**
     * @param mixed $dsSexo
     * @return desbravador
     */
    public function setDsSexo($dsSexo)
    {
        $this->dsSexo = $dsSexo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return desbravador
     */
    public function setCidade( cidade $cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnBatizado()
    {
        return $this->snBatizado;
    }

    /**
     * @param mixed $snBatizado
     * @return desbravador
     */
    public function setSnBatizado($snBatizado)
    {
        $this->snBatizado = $snBatizado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReligiao()
    {
        return $this->religiao;
    }

    /**
     * @param mixed $religiao
     * @return desbravador
     */
    public function setReligiao( religiao $religiao)
    {
        $this->religiao = $religiao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnRecebeuLenco()
    {
        return $this->snRecebeuLenco;
    }

    /**
     * @param mixed $snRecebeuLenco
     * @return desbravador
     */
    public function setSnRecebeuLenco($snRecebeuLenco)
    {
        $this->snRecebeuLenco = $snRecebeuLenco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtRecebeuLenco()
    {
        return $this->dtRecebeuLenco;
    }

    /**
     * @param mixed $dtRecebeuLenco
     * @return desbravador
     */
    public function setDtRecebeuLenco($dtRecebeuLenco)
    {
        $this->dtRecebeuLenco = $dtRecebeuLenco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsFoto()
    {
        return $this->dsFoto;
    }

    /**
     * @param mixed $dsFoto
     * @return desbravador
     */
    public function setDsFoto($dsFoto)
    {
        $this->dsFoto = $dsFoto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrCep()
    {
        return $this->nrCep;
    }

    /**
     * @param mixed $nrCep
     * @return desbravador
     */
    public function setNrCep($nrCep)
    {
        $this->nrCep = $nrCep;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEmail()
    {
        return $this->dsEmail;
    }

    /**
     * @param mixed $dsEmail
     * @return desbravador
     */
    public function setDsEmail($dsEmail)
    {
        $this->dsEmail = $dsEmail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnAtivo()
    {
        return $this->snAtivo;
    }

    /**
     * @param mixed $snAtivo
     * @return desbravador
     */
    public function setSnAtivo($snAtivo)
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }


}
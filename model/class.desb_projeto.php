<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 23/07/17
 * Time: 13:55
 */
class desb_projeto
{
    private $cdDesbProjeto;
    private $projeto;
    private $desbravador;
    private $obsProjeto;

    /**
     * @return mixed
     */
    public function getCdDesbProjeto()
    {
        return $this->cdDesbProjeto;
    }

    /**
     * @param mixed $cdDesbProjeto
     * @return desb_projeto
     */
    public function setCdDesbProjeto($cdDesbProjeto)
    {
        $this->cdDesbProjeto = $cdDesbProjeto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProjeto()
    {
        return $this->projeto;
    }

    /**
     * @param mixed $projeto
     * @return desb_projeto
     */
    public function setProjeto(projeto $projeto)
    {
        $this->projeto = $projeto;
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
     * @return desb_projeto
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsProjeto()
    {
        return $this->obsProjeto;
    }

    /**
     * @param mixed $obsProjeto
     * @return desb_projeto
     */
    public function setObsProjeto($obsProjeto)
    {
        $this->obsProjeto = $obsProjeto;
        return $this;
    }


}
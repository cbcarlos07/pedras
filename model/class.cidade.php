<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:22
 */
class cidade
{
    private $cdCidade;
    private $nmCidade;
    private $uf;

    /**
     * @return mixed
     */
    public function getCdCidade()
    {
        return $this->cdCidade;
    }

    /**
     * @param mixed $cdCidade
     * @return cidade
     */
    public function setCdCidade($cdCidade)
    {
        $this->cdCidade = $cdCidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmCidade()
    {
        return $this->nmCidade;
    }

    /**
     * @param mixed $nmCidade
     * @return cidade
     */
    public function setNmCidade($nmCidade)
    {
        $this->nmCidade = $nmCidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     * @return cidade
     */
    public function setUf( uf $uf)
    {
        $this->uf = $uf;
        return $this;
    }


}
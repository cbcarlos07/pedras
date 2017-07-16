<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:16
 */
class uf
{
    private $cdUf;
    private $nmUf;
    private $siglaUf;

    /**
     * @return mixed
     */
    public function getCdUf()
    {
        return $this->cdUf;
    }

    /**
     * @param mixed $cdUf
     * @return uf
     */
    public function setCdUf($cdUf)
    {
        $this->cdUf = $cdUf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmUf()
    {
        return $this->nmUf;
    }

    /**
     * @param mixed $nmUf
     * @return uf
     */
    public function setNmUf($nmUf)
    {
        $this->nmUf = $nmUf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSiglaUf()
    {
        return $this->siglaUf;
    }

    /**
     * @param mixed $siglaUf
     * @return uf
     */
    public function setSiglaUf($siglaUf)
    {
        $this->siglaUf = $siglaUf;
        return $this;
    }

}
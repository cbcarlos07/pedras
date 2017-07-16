<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:16
 */
class responsavel
{
    private $cdResponsavel;
    private $nmResponsavel;

    /**
     * @return mixed
     */
    public function getCdResponsavel()
    {
        return $this->cdResponsavel;
    }

    /**
     * @param mixed $cdResponsavel
     * @return responsavel
     */
    public function setCdResponsavel($cdResponsavel)
    {
        $this->cdResponsavel = $cdResponsavel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmResponsavel()
    {
        return $this->nmResponsavel;
    }

    /**
     * @param mixed $nmResponsavel
     * @return responsavel
     */
    public function setNmResponsavel($nmResponsavel)
    {
        $this->nmResponsavel = $nmResponsavel;
        return $this;
    }


}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:13
 */
class fone_resp
{
    private $cdFone;
    private $nrFone;
    private $responsavel;
    private $foneObs;

    /**
     * @return mixed
     */
    public function getCdFone()
    {
        return $this->cdFone;
    }

    /**
     * @param mixed $cdFone
     * @return fone_resp
     */
    public function setCdFone($cdFone)
    {
        $this->cdFone = $cdFone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrFone()
    {
        return $this->nrFone;
    }

    /**
     * @param mixed $nrFone
     * @return fone_resp
     */
    public function setNrFone($nrFone)
    {
        $this->nrFone = $nrFone;
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
     * @return fone_resp
     */
    public function setResponsavel( responsavel $responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoneObs()
    {
        return $this->foneObs;
    }

    /**
     * @param mixed $foneObs
     * @return fone_resp
     */
    public function setFoneObs($foneObs)
    {
        $this->foneObs = $foneObs;
        return $this;
    }

}
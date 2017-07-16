<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:12
 */
class fone_desb
{
  private $desbravador;
  private $cdFone;
  private $nrFone;
  private $obsFone;

    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return fone_desb
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCdFone()
    {
        return $this->cdFone;
    }

    /**
     * @param mixed $cdFone
     * @return fone_desb
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
     * @return fone_desb
     */
    public function setNrFone($nrFone)
    {
        $this->nrFone = $nrFone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObsFone()
    {
        return $this->obsFone;
    }

    /**
     * @param mixed $obsFone
     * @return fone_desb
     */
    public function setObsFone($obsFone)
    {
        $this->obsFone = $obsFone;
        return $this;
    }


}
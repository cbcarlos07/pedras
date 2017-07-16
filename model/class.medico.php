<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:59
 */
class medico
{
 private $desbravador;
 private $tipoSanguineo;
 private $fatorRH;
 private $snVacContTet; //Vacina Contra Tétano
 private $dtVacContTet;
 private $dsDoenca;
 private $dsAlergia;
 private $acidenteAvisar;

    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return medico
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoSanguineo()
    {
        return $this->tipoSanguineo;
    }

    /**
     * @param mixed $tipoSanguineo
     * @return medico
     */
    public function setTipoSanguineo($tipoSanguineo)
    {
        $this->tipoSanguineo = $tipoSanguineo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatorRH()
    {
        return $this->fatorRH;
    }

    /**
     * @param mixed $fatorRH
     * @return medico
     */
    public function setFatorRH($fatorRH)
    {
        $this->fatorRH = $fatorRH;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnVacContTet()
    {
        return $this->snVacContTet;
    }

    /**
     * @param mixed $snVacContTet
     * @return medico
     */
    public function setSnVacContTet($snVacContTet)
    {
        $this->snVacContTet = $snVacContTet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtVacContTet()
    {
        return $this->dtVacContTet;
    }

    /**
     * @param mixed $dtVacContTet
     * @return medico
     */
    public function setDtVacContTet($dtVacContTet)
    {
        $this->dtVacContTet = $dtVacContTet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsDoenca()
    {
        return $this->dsDoenca;
    }

    /**
     * @param mixed $dsDoenca
     * @return medico
     */
    public function setDsDoenca($dsDoenca)
    {
        $this->dsDoenca = $dsDoenca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsAlergia()
    {
        return $this->dsAlergia;
    }

    /**
     * @param mixed $dsAlergia
     * @return medico
     */
    public function setDsAlergia($dsAlergia)
    {
        $this->dsAlergia = $dsAlergia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcidenteAvisar()
    {
        return $this->acidenteAvisar;
    }

    /**
     * @param mixed $acidenteAvisar
     * @return medico
     */
    public function setAcidenteAvisar($acidenteAvisar)
    {
        $this->acidenteAvisar = $acidenteAvisar;
        return $this;
    } // em caso de aciente avisar ?


}
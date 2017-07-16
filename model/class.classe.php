<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:20
 */
class classe
{
    private $cdClasse;
    private $dsClasse;
    private $tpClasse;

    /**
     * @return mixed
     */
    public function getCdClasse()
    {
        return $this->cdClasse;
    }

    /**
     * @param mixed $cdClasse
     * @return classe
     */
    public function setCdClasse($cdClasse)
    {
        $this->cdClasse = $cdClasse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsClasse()
    {
        return $this->dsClasse;
    }

    /**
     * @param mixed $dsClasse
     * @return classe
     */
    public function setDsClasse($dsClasse)
    {
        $this->dsClasse = $dsClasse;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTpClasse()
    {
        return $this->tpClasse;
    }

    /**
     * @param mixed $tpClasse
     * @return classe
     */
    public function setTpClasse($tpClasse)
    {
        $this->tpClasse = $tpClasse;
        return $this;
    } //A = Avançadas , R =  Regulares

}
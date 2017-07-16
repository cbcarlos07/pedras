<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:48
 */
class nivel
{
  private $cdNivel;
  private $dsNivel;

    /**
     * @return mixed
     */
    public function getCdNivel()
    {
        return $this->cdNivel;
    }

    /**
     * @param mixed $cdNivel
     * @return nivel
     */
    public function setCdNivel($cdNivel)
    {
        $this->cdNivel = $cdNivel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsNivel()
    {
        return $this->dsNivel;
    }

    /**
     * @param mixed $dsNivel
     * @return nivel
     */
    public function setDsNivel($dsNivel)
    {
        $this->dsNivel = $dsNivel;
        return $this;
    }

}
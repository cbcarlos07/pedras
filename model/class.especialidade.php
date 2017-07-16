<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:03
 */
class especialidade
{
  private $cdEspecialidade;
  private $dsEspecialidade;

    /**
     * @return mixed
     */
    public function getCdEspecialidade()
    {
        return $this->cdEspecialidade;
    }

    /**
     * @param mixed $cdEspecialidade
     * @return especialidade
     */
    public function setCdEspecialidade($cdEspecialidade)
    {
        $this->cdEspecialidade = $cdEspecialidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEspecialidade()
    {
        return $this->dsEspecialidade;
    }

    /**
     * @param mixed $dsEspecialidade
     * @return especialidade
     */
    public function setDsEspecialidade($dsEspecialidade)
    {
        $this->dsEspecialidade = $dsEspecialidade;
        return $this;
    }

}
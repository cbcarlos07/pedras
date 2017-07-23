<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 23/07/17
 * Time: 13:54
 */
class projeto
{
 private $cdProjeto;
 private $dsProjeto;
 private $obsProjeto;

    /**
     * @return mixed
     */
    public function getCdProjeto()
    {
        return $this->cdProjeto;
    }

    /**
     * @param mixed $cdProjeto
     * @return projeto
     */
    public function setCdProjeto($cdProjeto)
    {
        $this->cdProjeto = $cdProjeto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsProjeto()
    {
        return $this->dsProjeto;
    }

    /**
     * @param mixed $dsProjeto
     * @return projeto
     */
    public function setDsProjeto($dsProjeto)
    {
        $this->dsProjeto = $dsProjeto;
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
     * @return projeto
     */
    public function setObsProjeto($obsProjeto)
    {
        $this->obsProjeto = $obsProjeto;
        return $this;
    }


}
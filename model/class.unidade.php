<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:30
 */
class unidade
{
    private $cdUnidade;
    private $dsUnidade;
    private $categoria;

    /**
     * @return mixed
     */
    public function getCdUnidade()
    {
        return $this->cdUnidade;
    }

    /**
     * @param mixed $cdUnidade
     * @return unidade
     */
    public function setCdUnidade($cdUnidade)
    {
        $this->cdUnidade = $cdUnidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsUnidade()
    {
        return $this->dsUnidade;
    }

    /**
     * @param mixed $dsUnidade
     * @return unidade
     */
    public function setDsUnidade($dsUnidade)
    {
        $this->dsUnidade = $dsUnidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     * @return unidade
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

}
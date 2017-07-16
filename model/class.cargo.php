<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:14
 */
class cargo
{
    private $cdCargo;
    private $dsCargo;

    /**
     * @return mixed
     */
    public function getCdCargo()
    {
        return $this->cdCargo;
    }

    /**
     * @param mixed $cdCargo
     * @return cargo
     */
    public function setCdCargo($cdCargo)
    {
        $this->cdCargo = $cdCargo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsCargo()
    {
        return $this->dsCargo;
    }

    /**
     * @param mixed $dsCargo
     * @return cargo
     */
    public function setDsCargo($dsCargo)
    {
        $this->dsCargo = $dsCargo;
        return $this;
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:21
 */
class curso
{
    private $cdLideranca;
    private $dsLideranca;

    /**
     * @return mixed
     */
    public function getCdLideranca()
    {
        return $this->cdLideranca;
    }

    /**
     * @param mixed $cdLideranca
     * @return curso
     */
    public function setCdLideranca($cdLideranca)
    {
        $this->cdLideranca = $cdLideranca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsLideranca()
    {
        return $this->dsLideranca;
    }

    /**
     * @param mixed $dsLideranca
     * @return curso
     */
    public function setDsLideranca($dsLideranca)
    {
        $this->dsLideranca = $dsLideranca;
        return $this;
    }


}
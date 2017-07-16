<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:14
 */
class religiao
{
  private $cdReligiao;
  private $nmReligiao;

    /**
     * @return mixed
     */
    public function getCdReligiao()
    {
        return $this->cdReligiao;
    }

    /**
     * @param mixed $cdReligiao
     * @return religiao
     */
    public function setCdReligiao($cdReligiao)
    {
        $this->cdReligiao = $cdReligiao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmReligiao()
    {
        return $this->nmReligiao;
    }

    /**
     * @param mixed $nmReligiao
     * @return religiao
     */
    public function setNmReligiao($nmReligiao)
    {
        $this->nmReligiao = $nmReligiao;
        return $this;
    }


}
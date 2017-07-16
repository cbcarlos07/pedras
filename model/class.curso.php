<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 16:21
 */
class curso
{
    private $cdCurso;
    private $dsCurso;

    /**
     * @return mixed
     */
    public function getCdCurso()
    {
        return $this->cdCurso;
    }

    /**
     * @param mixed $cdCurso
     * @return curso
     */
    public function setCdCurso($cdCurso)
    {
        $this->cdCurso = $cdCurso;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsCurso()
    {
        return $this->dsCurso;
    }

    /**
     * @param mixed $dsCurso
     * @return curso
     */
    public function setDsCurso($dsCurso)
    {
        $this->dsCurso = $dsCurso;
        return $this;
    }



}
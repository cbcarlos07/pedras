<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class nivelList
{
    private $_nivel;
    private $_nivelCount;

    /**
     * NivelList constructor.
     * @param $_nivel
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getNivelCount()
    {
        return $this->_nivelCount;
    }

    /**
     * @param mixed $nivelCount
     * @return NivelList
     */
    public function setNivelCount($newCount)
    {
        $this->_nivelCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNivel($_nivelNumberToGet)
    {
        if((is_numeric($_nivelNumberToGet)) && ($_nivelNumberToGet <= $this->getNivelCount())){
            return $this->_nivel[$_nivelNumberToGet];
        }else{
            return null;
        }
    }

    public function addNivel(nivel $_nivel_in) {
        $this->setNivelCount($this->getNivelCount() + 1);
        $this->_nivel[$this->getNivelCount()] = $_nivel_in;
        return $this->getNivelCount();
    }
    public function removeNivel(nivel $_nivel_in) {
        $counter = 0;
        while (++$counter <= $this->getNivelCount()) {
            if ($_nivel_in->getAuthorAndTitle() ==
                $this->_nivel[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getNivelCount(); $x++) {
                    $this->_nivel[$x] = $this->_nivel[$x + 1];
                }
                $this->setNivelCount($this->getNivelCount() - 1);
            }
        }
        return $this->getNivelCount();
    }


}
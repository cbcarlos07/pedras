<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class ufList
{
    private $_uf;
    private $_ufCount;

    /**
     * UfList constructor.
     * @param $_uf
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getUfCount()
    {
        return $this->_ufCount;
    }

    /**
     * @param mixed $ufCount
     * @return UfList
     */
    public function setUfCount($newCount)
    {
        $this->_ufCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUf($_ufNumberToGet)
    {
        if((is_numeric($_ufNumberToGet)) && ($_ufNumberToGet <= $this->getUfCount())){
            return $this->_uf[$_ufNumberToGet];
        }else{
            return null;
        }
    }

    public function addUf(Uf $_uf_in) {
        $this->setUfCount($this->getUfCount() + 1);
        $this->_uf[$this->getUfCount()] = $_uf_in;
        return $this->getUfCount();
    }
    public function removeUf(Uf $_uf_in) {
        $counter = 0;
        while (++$counter <= $this->getUfCount()) {
            if ($_uf_in->getAuthorAndTitle() ==
                $this->_uf[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getUfCount(); $x++) {
                    $this->_uf[$x] = $this->_uf[$x + 1];
                }
                $this->setUfCount($this->getUfCount() - 1);
            }
        }
        return $this->getUfCount();
    }


}
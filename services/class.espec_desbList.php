<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class espec_desbList
{
    private $_espec_desb;
    private $_espec_desbCount;

    /**
     * Espec_desbList constructor.
     * @param $_espec_desb
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEspec_desbCount()
    {
        return $this->_espec_desbCount;
    }

    /**
     * @param mixed $espec_desbCount
     * @return Espec_desbList
     */
    public function setEspec_desbCount($newCount)
    {
        $this->_espec_desbCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspec_desb($_espec_desbNumberToGet)
    {
        if((is_numeric($_espec_desbNumberToGet)) && ($_espec_desbNumberToGet <= $this->getEspec_desbCount())){
            return $this->_espec_desb[$_espec_desbNumberToGet];
        }else{
            return null;
        }
    }

    public function addEspec_desb(Espec_desb $_espec_desb_in) {
        $this->setEspec_desbCount($this->getEspec_desbCount() + 1);
        $this->_espec_desb[$this->getEspec_desbCount()] = $_espec_desb_in;
        return $this->getEspec_desbCount();
    }
    public function removeEspec_desb(Espec_desb $_espec_desb_in) {
        $counter = 0;
        while (++$counter <= $this->getEspec_desbCount()) {
            if ($_espec_desb_in->getAuthorAndTitle() ==
                $this->_espec_desb[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getEspec_desbCount(); $x++) {
                    $this->_espec_desb[$x] = $this->_espec_desb[$x + 1];
                }
                $this->setEspec_desbCount($this->getEspec_desbCount() - 1);
            }
        }
        return $this->getEspec_desbCount();
    }


}
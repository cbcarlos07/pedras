<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class fone_desbList
{
    private $_fone_desb;
    private $_fone_desbCount;

    /**
     * Fone_desbList constructor.
     * @param $_fone_desb
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getFone_desbCount()
    {
        return $this->_fone_desbCount;
    }

    /**
     * @param mixed $fone_desbCount
     * @return Fone_desbList
     */
    public function setFone_desbCount($newCount)
    {
        $this->_fone_desbCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone_desb($_fone_desbNumberToGet)
    {
        if((is_numeric($_fone_desbNumberToGet)) && ($_fone_desbNumberToGet <= $this->getFone_desbCount())){
            return $this->_fone_desb[$_fone_desbNumberToGet];
        }else{
            return null;
        }
    }

    public function addFone_desb(Fone_desb $_fone_desb_in) {
        $this->setFone_desbCount($this->getFone_desbCount() + 1);
        $this->_fone_desb[$this->getFone_desbCount()] = $_fone_desb_in;
        return $this->getFone_desbCount();
    }
    public function removeFone_desb(Fone_desb $_fone_desb_in) {
        $counter = 0;
        while (++$counter <= $this->getFone_desbCount()) {
            if ($_fone_desb_in->getAuthorAndTitle() ==
                $this->_fone_desb[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getFone_desbCount(); $x++) {
                    $this->_fone_desb[$x] = $this->_fone_desb[$x + 1];
                }
                $this->setFone_desbCount($this->getFone_desbCount() - 1);
            }
        }
        return $this->getFone_desbCount();
    }


}
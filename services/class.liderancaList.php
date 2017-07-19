<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class liderancaList
{
    private $_lideranca;
    private $_liderancaCount;

    /**
     * LiderancaList constructor.
     * @param $_lideranca
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getLiderancaCount()
    {
        return $this->_liderancaCount;
    }

    /**
     * @param mixed $liderancaCount
     * @return LiderancaList
     */
    public function setLiderancaCount($newCount)
    {
        $this->_liderancaCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLideranca($_liderancaNumberToGet)
    {
        if((is_numeric($_liderancaNumberToGet)) && ($_liderancaNumberToGet <= $this->getLiderancaCount())){
            return $this->_lideranca[$_liderancaNumberToGet];
        }else{
            return null;
        }
    }

    public function addLideranca(Lideranca $_lideranca_in) {
        $this->setLiderancaCount($this->getLiderancaCount() + 1);
        $this->_lideranca[$this->getLiderancaCount()] = $_lideranca_in;
        return $this->getLiderancaCount();
    }
    public function removeLideranca(Lideranca $_lideranca_in) {
        $counter = 0;
        while (++$counter <= $this->getLiderancaCount()) {
            if ($_lideranca_in->getAuthorAndTitle() ==
                $this->_lideranca[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getLiderancaCount(); $x++) {
                    $this->_lideranca[$x] = $this->_lideranca[$x + 1];
                }
                $this->setLiderancaCount($this->getLiderancaCount() - 1);
            }
        }
        return $this->getLiderancaCount();
    }


}
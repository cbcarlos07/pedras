<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class investiduraList
{
    private $_investidura;
    private $_investiduraCount;

    /**
     * InvestiduraList constructor.
     * @param $_investidura
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getInvestiduraCount()
    {
        return $this->_investiduraCount;
    }

    /**
     * @param mixed $investiduraCount
     * @return InvestiduraList
     */
    public function setInvestiduraCount($newCount)
    {
        $this->_investiduraCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvestidura($_investiduraNumberToGet)
    {
        if((is_numeric($_investiduraNumberToGet)) && ($_investiduraNumberToGet <= $this->getInvestiduraCount())){
            return $this->_investidura[$_investiduraNumberToGet];
        }else{
            return null;
        }
    }

    public function addInvestidura(investidura $_investidura_in) {
        $this->setInvestiduraCount($this->getInvestiduraCount() + 1);
        $this->_investidura[$this->getInvestiduraCount()] = $_investidura_in;
        return $this->getInvestiduraCount();
    }
    public function removeInvestidura(investidura $_investidura_in) {
        $counter = 0;
        while (++$counter <= $this->getInvestiduraCount()) {
            if ($_investidura_in->getAuthorAndTitle() ==
                $this->_investidura[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getInvestiduraCount(); $x++) {
                    $this->_investidura[$x] = $this->_investidura[$x + 1];
                }
                $this->setInvestiduraCount($this->getInvestiduraCount() - 1);
            }
        }
        return $this->getInvestiduraCount();
    }


}
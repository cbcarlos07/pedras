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
     * CargoList constructor.
     * @param $_investidura
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCargoCount()
    {
        return $this->_investiduraCount;
    }

    /**
     * @param mixed $investiduraCount
     * @return CargoList
     */
    public function setCargoCount($newCount)
    {
        $this->_investiduraCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCargo($_investiduraNumberToGet)
    {
        if((is_numeric($_investiduraNumberToGet)) && ($_investiduraNumberToGet <= $this->getCargoCount())){
            return $this->_investidura[$_investiduraNumberToGet];
        }else{
            return null;
        }
    }

    public function addCargo(cargo $_investidura_in) {
        $this->setCargoCount($this->getCargoCount() + 1);
        $this->_investidura[$this->getCargoCount()] = $_investidura_in;
        return $this->getCargoCount();
    }
    public function removeCargo(cargo $_investidura_in) {
        $counter = 0;
        while (++$counter <= $this->getCargoCount()) {
            if ($_investidura_in->getAuthorAndTitle() ==
                $this->_investidura[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getCargoCount(); $x++) {
                    $this->_investidura[$x] = $this->_investidura[$x + 1];
                }
                $this->setInvestiduraCount($this->getCargoCount() - 1);
            }
        }
        return $this->getCargoCount();
    }


}
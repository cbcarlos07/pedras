<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class desb_cargoList
{
    private $_desb_cargo;
    private $_desb_cargoCount;

    /**
     * Desb_cargoList constructor.
     * @param $_desb_cargo
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDesb_cargoCount()
    {
        return $this->_desb_cargoCount;
    }

    /**
     * @param mixed $desb_cargoCount
     * @return Desb_cargoList
     */
    public function setDesb_cargoCount($newCount)
    {
        $this->_desb_cargoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesb_cargo($_desb_cargoNumberToGet)
    {
        if((is_numeric($_desb_cargoNumberToGet)) && ($_desb_cargoNumberToGet <= $this->getDesb_cargoCount())){
            return $this->_desb_cargo[$_desb_cargoNumberToGet];
        }else{
            return null;
        }
    }

    public function addDesb_cargo(Desb_cargo $_desb_cargo_in) {
        $this->setDesb_cargoCount($this->getDesb_cargoCount() + 1);
        $this->_desb_cargo[$this->getDesb_cargoCount()] = $_desb_cargo_in;
        return $this->getDesb_cargoCount();
    }
    public function removeDesb_cargo(Desb_cargo $_desb_cargo_in) {
        $counter = 0;
        while (++$counter <= $this->getDesb_cargoCount()) {
            if ($_desb_cargo_in->getAuthorAndTitle() ==
                $this->_desb_cargo[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDesb_cargoCount(); $x++) {
                    $this->_desb_cargo[$x] = $this->_desb_cargo[$x + 1];
                }
                $this->setDesb_cargoCount($this->getDesb_cargoCount() - 1);
            }
        }
        return $this->getDesb_cargoCount();
    }


}
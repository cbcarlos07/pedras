<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class desbravadorList
{
    private $_desbravador;
    private $_desbravadorCount;

    /**
     * DesbravadorList constructor.
     * @param $_desbravador
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDesbravadorCount()
    {
        return $this->_desbravadorCount;
    }

    /**
     * @param mixed $desbravadorCount
     * @return DesbravadorList
     */
    public function setDesbravadorCount($newCount)
    {
        $this->_desbravadorCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesbravador($_desbravadorNumberToGet)
    {
        if((is_numeric($_desbravadorNumberToGet)) && ($_desbravadorNumberToGet <= $this->getDesbravadorCount())){
            return $this->_desbravador[$_desbravadorNumberToGet];
        }else{
            return null;
        }
    }

    public function addDesbravador(desbravador $_desbravador_in) {
        $this->setDesbravadorCount($this->getDesbravadorCount() + 1);
        $this->_desbravador[$this->getDesbravadorCount()] = $_desbravador_in;
        return $this->getDesbravadorCount();
    }
    public function removeDesbravador(desbravador $_desbravador_in) {
        $counter = 0;
        while (++$counter <= $this->getDesbravadorCount()) {
            if ($_desbravador_in->getAuthorAndTitle() ==
                $this->_desbravador[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDesbravadorCount(); $x++) {
                    $this->_desbravador[$x] = $this->_desbravador[$x + 1];
                }
                $this->setDesbravadorCount($this->getDesbravadorCount() - 1);
            }
        }
        return $this->getDesbravadorCount();
    }


}
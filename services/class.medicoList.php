<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class medicoList
{
    private $_medico;
    private $_medicoCount;

    /**
     * MedicoList constructor.
     * @param $_medico
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getMedicoCount()
    {
        return $this->_medicoCount;
    }

    /**
     * @param mixed $medicoCount
     * @return MedicoList
     */
    public function setMedicoCount($newCount)
    {
        $this->_medicoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMedico($_medicoNumberToGet)
    {
        if((is_numeric($_medicoNumberToGet)) && ($_medicoNumberToGet <= $this->getMedicoCount())){
            return $this->_medico[$_medicoNumberToGet];
        }else{
            return null;
        }
    }

    public function addMedico(medico $_medico_in) {
        $this->setMedicoCount($this->getMedicoCount() + 1);
        $this->_medico[$this->getMedicoCount()] = $_medico_in;
        return $this->getMedicoCount();
    }
    public function removeMedico(medico $_medico_in) {
        $counter = 0;
        while (++$counter <= $this->getMedicoCount()) {
            if ($_medico_in->getAuthorAndTitle() ==
                $this->_medico[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getMedicoCount(); $x++) {
                    $this->_medico[$x] = $this->_medico[$x + 1];
                }
                $this->setMedicoCount($this->getMedicoCount() - 1);
            }
        }
        return $this->getMedicoCount();
    }


}
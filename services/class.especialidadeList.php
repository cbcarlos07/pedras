<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class especialidadeList
{
    private $_especialidade;
    private $_especialidadeCount;

    /**
     * EspecialidadeList constructor.
     * @param $_especialidade
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEspecialidadeCount()
    {
        return $this->_especialidadeCount;
    }

    /**
     * @param mixed $especialidadeCount
     * @return EspecialidadeList
     */
    public function setEspecialidadeCount($newCount)
    {
        $this->_especialidadeCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecialidade($_especialidadeNumberToGet)
    {
        if((is_numeric($_especialidadeNumberToGet)) && ($_especialidadeNumberToGet <= $this->getEspecialidadeCount())){
            return $this->_especialidade[$_especialidadeNumberToGet];
        }else{
            return null;
        }
    }

    public function addEspecialidade(Especialidade $_especialidade_in) {
        $this->setEspecialidadeCount($this->getEspecialidadeCount() + 1);
        $this->_especialidade[$this->getEspecialidadeCount()] = $_especialidade_in;
        return $this->getEspecialidadeCount();
    }
    public function removeEspecialidade(Especialidade $_especialidade_in) {
        $counter = 0;
        while (++$counter <= $this->getEspecialidadeCount()) {
            if ($_especialidade_in->getAuthorAndTitle() ==
                $this->_especialidade[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getEspecialidadeCount(); $x++) {
                    $this->_especialidade[$x] = $this->_especialidade[$x + 1];
                }
                $this->setEspecialidadeCount($this->getEspecialidadeCount() - 1);
            }
        }
        return $this->getEspecialidadeCount();
    }


}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class unidadeList
{
    private $_unidade;
    private $_unidadeCount;

    /**
     * UnidadeList constructor.
     * @param $_unidade
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getUnidadeCount()
    {
        return $this->_unidadeCount;
    }

    /**
     * @param mixed $unidadeCount
     * @return UnidadeList
     */
    public function setUnidadeCount($newCount)
    {
        $this->_unidadeCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnidade($_unidadeNumberToGet)
    {
        if((is_numeric($_unidadeNumberToGet)) && ($_unidadeNumberToGet <= $this->getUnidadeCount())){
            return $this->_unidade[$_unidadeNumberToGet];
        }else{
            return null;
        }
    }

    public function addUnidade(Unidade $_unidade_in) {
        $this->setUnidadeCount($this->getUnidadeCount() + 1);
        $this->_unidade[$this->getUnidadeCount()] = $_unidade_in;
        return $this->getUnidadeCount();
    }
    public function removeUnidade(Unidade $_unidade_in) {
        $counter = 0;
        while (++$counter <= $this->getUnidadeCount()) {
            if ($_unidade_in->getAuthorAndTitle() ==
                $this->_unidade[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getUnidadeCount(); $x++) {
                    $this->_unidade[$x] = $this->_unidade[$x + 1];
                }
                $this->setUnidadeCount($this->getUnidadeCount() - 1);
            }
        }
        return $this->getUnidadeCount();
    }


}
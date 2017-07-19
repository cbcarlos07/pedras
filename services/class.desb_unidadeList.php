<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class desb_unidadeList
{
    private $_desb_unidade;
    private $_desb_unidadeCount;

    /**
     * Desb_unidadeList constructor.
     * @param $_desb_unidade
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDesb_unidadeCount()
    {
        return $this->_desb_unidadeCount;
    }

    /**
     * @param mixed $desb_unidadeCount
     * @return Desb_unidadeList
     */
    public function setDesb_unidadeCount($newCount)
    {
        $this->_desb_unidadeCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesb_unidade($_desb_unidadeNumberToGet)
    {
        if((is_numeric($_desb_unidadeNumberToGet)) && ($_desb_unidadeNumberToGet <= $this->getDesb_unidadeCount())){
            return $this->_desb_unidade[$_desb_unidadeNumberToGet];
        }else{
            return null;
        }
    }

    public function addDesb_unidade(desb_unidade $_desb_unidade_in) {
        $this->setDesb_unidadeCount($this->getDesb_unidadeCount() + 1);
        $this->_desb_unidade[$this->getDesb_unidadeCount()] = $_desb_unidade_in;
        return $this->getDesb_unidadeCount();
    }
    public function removeDesb_unidade(desb_unidade $_desb_unidade_in) {
        $counter = 0;
        while (++$counter <= $this->getDesb_unidadeCount()) {
            if ($_desb_unidade_in->getAuthorAndTitle() ==
                $this->_desb_unidade[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDesb_unidadeCount(); $x++) {
                    $this->_desb_unidade[$x] = $this->_desb_unidade[$x + 1];
                }
                $this->setDesb_unidadeCount($this->getDesb_unidadeCount() - 1);
            }
        }
        return $this->getDesb_unidadeCount();
    }


}
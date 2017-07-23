<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class anotacaoList
{
    private $_anotacao;
    private $_anotacaoCount;

    /**
     * AnotacaoList constructor.
     * @param $_anotacao
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getAnotacaoCount()
    {
        return $this->_anotacaoCount;
    }

    /**
     * @param mixed $anotacaoCount
     * @return AnotacaoList
     */
    public function setAnotacaoCount($newCount)
    {
        $this->_anotacaoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnotacao($_anotacaoNumberToGet)
    {
        if((is_numeric($_anotacaoNumberToGet)) && ($_anotacaoNumberToGet <= $this->getAnotacaoCount())){
            return $this->_anotacao[$_anotacaoNumberToGet];
        }else{
            return null;
        }
    }

    public function addAnotacao(anotacao $_anotacao_in) {
        $this->setAnotacaoCount($this->getAnotacaoCount() + 1);
        $this->_anotacao[$this->getAnotacaoCount()] = $_anotacao_in;
        return $this->getAnotacaoCount();
    }
    public function removeAnotacao(anotacao $_anotacao_in) {
        $counter = 0;
        while (++$counter <= $this->getAnotacaoCount()) {
            if ($_anotacao_in->getAuthorAndTitle() ==
                $this->_anotacao[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getAnotacaoCount(); $x++) {
                    $this->_anotacao[$x] = $this->_anotacao[$x + 1];
                }
                $this->setAnotacaoCount($this->getAnotacaoCount() - 1);
            }
        }
        return $this->getAnotacaoCount();
    }


}
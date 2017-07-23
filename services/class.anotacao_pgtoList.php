<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class anotacao_pgtoList
{
    private $_anotacao_pgto;
    private $_anotacao_pgtoCount;

    /**
     * Anotacao_pgtoList constructor.
     * @param $_anotacao_pgto
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getAnotacao_pgtoCount()
    {
        return $this->_anotacao_pgtoCount;
    }

    /**
     * @param mixed $anotacao_pgtoCount
     * @return Anotacao_pgtoList
     */
    public function setAnotacao_pgtoCount($newCount)
    {
        $this->_anotacao_pgtoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnotacao_pgto($_anotacao_pgtoNumberToGet)
    {
        if((is_numeric($_anotacao_pgtoNumberToGet)) && ($_anotacao_pgtoNumberToGet <= $this->getAnotacao_pgtoCount())){
            return $this->_anotacao_pgto[$_anotacao_pgtoNumberToGet];
        }else{
            return null;
        }
    }

    public function addAnotacao_pgto(anotacao_pgto $_anotacao_pgto_in) {
        $this->setAnotacao_pgtoCount($this->getAnotacao_pgtoCount() + 1);
        $this->_anotacao_pgto[$this->getAnotacao_pgtoCount()] = $_anotacao_pgto_in;
        return $this->getAnotacao_pgtoCount();
    }
    public function removeAnotacao_pgto(anotacao_pgto $_anotacao_pgto_in) {
        $counter = 0;
        while (++$counter <= $this->getAnotacao_pgtoCount()) {
            if ($_anotacao_pgto_in->getAuthorAndTitle() ==
                $this->_anotacao_pgto[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getAnotacao_pgtoCount(); $x++) {
                    $this->_anotacao_pgto[$x] = $this->_anotacao_pgto[$x + 1];
                }
                $this->setAnotacao_pgtoCount($this->getAnotacao_pgtoCount() - 1);
            }
        }
        return $this->getAnotacao_pgtoCount();
    }


}
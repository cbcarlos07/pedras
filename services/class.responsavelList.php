<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class responsavelList
{
    private $_responsavel;
    private $_responsavelCount;

    /**
     * ResponsavelList constructor.
     * @param $_responsavel
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getResponsavelCount()
    {
        return $this->_responsavelCount;
    }

    /**
     * @param mixed $responsavelCount
     * @return ResponsavelList
     */
    public function setResponsavelCount($newCount)
    {
        $this->_responsavelCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsavel($_responsavelNumberToGet)
    {
        if((is_numeric($_responsavelNumberToGet)) && ($_responsavelNumberToGet <= $this->getResponsavelCount())){
            return $this->_responsavel[$_responsavelNumberToGet];
        }else{
            return null;
        }
    }

    public function addResponsavel(responsavel $_responsavel_in) {
        $this->setResponsavelCount($this->getResponsavelCount() + 1);
        $this->_responsavel[$this->getResponsavelCount()] = $_responsavel_in;
        return $this->getResponsavelCount();
    }
    public function removeResponsavel(responsavel $_responsavel_in) {
        $counter = 0;
        while (++$counter <= $this->getResponsavelCount()) {
            if ($_responsavel_in->getAuthorAndTitle() ==
                $this->_responsavel[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getResponsavelCount(); $x++) {
                    $this->_responsavel[$x] = $this->_responsavel[$x + 1];
                }
                $this->setResponsavelCount($this->getResponsavelCount() - 1);
            }
        }
        return $this->getResponsavelCount();
    }


}
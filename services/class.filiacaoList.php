<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class filiacaoList
{
    private $_filiacao;
    private $_filiacaoCount;

    /**
     * FiliacaoList constructor.
     * @param $_filiacao
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getFiliacaoCount()
    {
        return $this->_filiacaoCount;
    }

    /**
     * @param mixed $filiacaoCount
     * @return FiliacaoList
     */
    public function setFiliacaoCount($newCount)
    {
        $this->_filiacaoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiliacao($_filiacaoNumberToGet)
    {
        if((is_numeric($_filiacaoNumberToGet)) && ($_filiacaoNumberToGet <= $this->getFiliacaoCount())){
            return $this->_filiacao[$_filiacaoNumberToGet];
        }else{
            return null;
        }
    }

    public function addFiliacao(Filiacao $_filiacao_in) {
        $this->setFiliacaoCount($this->getFiliacaoCount() + 1);
        $this->_filiacao[$this->getFiliacaoCount()] = $_filiacao_in;
        return $this->getFiliacaoCount();
    }
    public function removeFiliacao(Filiacao $_filiacao_in) {
        $counter = 0;
        while (++$counter <= $this->getFiliacaoCount()) {
            if ($_filiacao_in->getAuthorAndTitle() ==
                $this->_filiacao[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getFiliacaoCount(); $x++) {
                    $this->_filiacao[$x] = $this->_filiacao[$x + 1];
                }
                $this->setFiliacaoCount($this->getFiliacaoCount() - 1);
            }
        }
        return $this->getFiliacaoCount();
    }


}
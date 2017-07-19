<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class identificacaoList
{
    private $_identificacao;
    private $_identificacaoCount;

    /**
     * IdentificacaoList constructor.
     * @param $_identificacao
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdentificacaoCount()
    {
        return $this->_identificacaoCount;
    }

    /**
     * @param mixed $identificacaoCount
     * @return IdentificacaoList
     */
    public function setIdentificacaoCount($newCount)
    {
        $this->_identificacaoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentificacao($_identificacaoNumberToGet)
    {
        if((is_numeric($_identificacaoNumberToGet)) && ($_identificacaoNumberToGet <= $this->getIdentificacaoCount())){
            return $this->_identificacao[$_identificacaoNumberToGet];
        }else{
            return null;
        }
    }

    public function addIdentificacao(Identificacao $_identificacao_in) {
        $this->setIdentificacaoCount($this->getIdentificacaoCount() + 1);
        $this->_identificacao[$this->getIdentificacaoCount()] = $_identificacao_in;
        return $this->getIdentificacaoCount();
    }
    public function removeIdentificacao(Identificacao $_identificacao_in) {
        $counter = 0;
        while (++$counter <= $this->getIdentificacaoCount()) {
            if ($_identificacao_in->getAuthorAndTitle() ==
                $this->_identificacao[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getIdentificacaoCount(); $x++) {
                    $this->_identificacao[$x] = $this->_identificacao[$x + 1];
                }
                $this->setIdentificacaoCount($this->getIdentificacaoCount() - 1);
            }
        }
        return $this->getIdentificacaoCount();
    }


}
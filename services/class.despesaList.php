<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class despesaList
{
    private $_despesa;
    private $_despesaCount;

    /**
     * DespesasList constructor.
     * @param $_despesas
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDespesaCount()
    {
        return $this->_despesaCount;
    }

    /**
     * @param mixed $despesasCount
     * @return DespesaList
     */
    public function setDespesaCount($newCount)
    {
        $this->_despesasCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDespesa($_despesasNumberToGet)
    {
        if((is_numeric($_despesasNumberToGet)) && ($_despesasNumberToGet <= $this->getDespesaCount())){
            return $this->_despesa[$_despesasNumberToGet];
        }else{
            return null;
        }
    }

    public function addDespesa(despesa $_despesas_in) {
        $this->setDespesaCount($this->getDespesaCount() + 1);
        $this->_despesa[$this->getDespesaCount()] = $_despesas_in;
        return $this->getDespesaCount();
    }
    public function removeDespesa(despesa $_despesas_in) {
        $counter = 0;
        while (++$counter <= $this->getDespesaCount()) {
            if ($_despesas_in->getAuthorAndTitle() ==
                $this->_despesa[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDespesaCount(); $x++) {
                    $this->_despesa[$x] = $this->_despesa[$x + 1];
                }
                $this->setDespesaCount($this->getDespesaCount() - 1);
            }
        }
        return $this->getDespesaCount();
    }


}
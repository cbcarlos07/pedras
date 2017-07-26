<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class despesasList
{
    private $_despesas;
    private $_despesasCount;

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
    public function getDespesasCount()
    {
        return $this->_despesasCount;
    }

    /**
     * @param mixed $despesasCount
     * @return DespesasList
     */
    public function setDespesasCount($newCount)
    {
        $this->_despesasCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDespesas($_despesasNumberToGet)
    {
        if((is_numeric($_despesasNumberToGet)) && ($_despesasNumberToGet <= $this->getDespesasCount())){
            return $this->_despesas[$_despesasNumberToGet];
        }else{
            return null;
        }
    }

    public function addDespesas(despesas $_despesas_in) {
        $this->setDespesasCount($this->getDespesasCount() + 1);
        $this->_despesas[$this->getDespesasCount()] = $_despesas_in;
        return $this->getDespesasCount();
    }
    public function removeDespesas(despesas $_despesas_in) {
        $counter = 0;
        while (++$counter <= $this->getDespesasCount()) {
            if ($_despesas_in->getAuthorAndTitle() ==
                $this->_despesas[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDespesasCount(); $x++) {
                    $this->_despesas[$x] = $this->_despesas[$x + 1];
                }
                $this->setDespesasCount($this->getDespesasCount() - 1);
            }
        }
        return $this->getDespesasCount();
    }


}
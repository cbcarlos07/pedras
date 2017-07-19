<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class pgto_desbList
{
    private $_pgto_desb;
    private $_pgto_desbCount;

    /**
     * Pgto_desbList constructor.
     * @param $_pgto_desb
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getPgto_desbCount()
    {
        return $this->_pgto_desbCount;
    }

    /**
     * @param mixed $pgto_desbCount
     * @return Pgto_desbList
     */
    public function setPgto_desbCount($newCount)
    {
        $this->_pgto_desbCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPgto_desb($_pgto_desbNumberToGet)
    {
        if((is_numeric($_pgto_desbNumberToGet)) && ($_pgto_desbNumberToGet <= $this->getPgto_desbCount())){
            return $this->_pgto_desb[$_pgto_desbNumberToGet];
        }else{
            return null;
        }
    }

    public function addPgto_desb(pgto_desb $_pgto_desb_in) {
        $this->setPgto_desbCount($this->getPgto_desbCount() + 1);
        $this->_pgto_desb[$this->getPgto_desbCount()] = $_pgto_desb_in;
        return $this->getPgto_desbCount();
    }
    public function removePgto_desb(pgto_desb $_pgto_desb_in) {
        $counter = 0;
        while (++$counter <= $this->getPgto_desbCount()) {
            if ($_pgto_desb_in->getAuthorAndTitle() ==
                $this->_pgto_desb[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getPgto_desbCount(); $x++) {
                    $this->_pgto_desb[$x] = $this->_pgto_desb[$x + 1];
                }
                $this->setPgto_desbCount($this->getPgto_desbCount() - 1);
            }
        }
        return $this->getPgto_desbCount();
    }


}
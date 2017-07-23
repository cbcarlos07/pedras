<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class desb_projetoList
{
    private $_desb_projeto;
    private $_desb_projetoCount;

    /**
     * Desb_projetoList constructor.
     * @param $_desb_projeto
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDesb_projetoCount()
    {
        return $this->_desb_projetoCount;
    }

    /**
     * @param mixed $desb_projetoCount
     * @return Desb_projetoList
     */
    public function setDesb_projetoCount($newCount)
    {
        $this->_desb_projetoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesb_projeto($_desb_projetoNumberToGet)
    {
        if((is_numeric($_desb_projetoNumberToGet)) && ($_desb_projetoNumberToGet <= $this->getDesb_projetoCount())){
            return $this->_desb_projeto[$_desb_projetoNumberToGet];
        }else{
            return null;
        }
    }

    public function addDesb_projeto(desb_projeto $_desb_projeto_in) {
        $this->setDesb_projetoCount($this->getDesb_projetoCount() + 1);
        $this->_desb_projeto[$this->getDesb_projetoCount()] = $_desb_projeto_in;
        return $this->getDesb_projetoCount();
    }
    public function removeDesb_projeto(desb_projeto $_desb_projeto_in) {
        $counter = 0;
        while (++$counter <= $this->getDesb_projetoCount()) {
            if ($_desb_projeto_in->getAuthorAndTitle() ==
                $this->_desb_projeto[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getDesb_projetoCount(); $x++) {
                    $this->_desb_projeto[$x] = $this->_desb_projeto[$x + 1];
                }
                $this->setDesb_projetoCount($this->getDesb_projetoCount() - 1);
            }
        }
        return $this->getDesb_projetoCount();
    }


}
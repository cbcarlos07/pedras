<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class projetoList
{
    private $_projeto;
    private $_projetoCount;

    /**
     * ProjetoList constructor.
     * @param $_projeto
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getProjetoCount()
    {
        return $this->_projetoCount;
    }

    /**
     * @param mixed $projetoCount
     * @return ProjetoList
     */
    public function setProjetoCount($newCount)
    {
        $this->_projetoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProjeto($_projetoNumberToGet)
    {
        if((is_numeric($_projetoNumberToGet)) && ($_projetoNumberToGet <= $this->getProjetoCount())){
            return $this->_projeto[$_projetoNumberToGet];
        }else{
            return null;
        }
    }

    public function addProjeto(projeto $_projeto_in) {
        $this->setProjetoCount($this->getProjetoCount() + 1);
        $this->_projeto[$this->getProjetoCount()] = $_projeto_in;
        return $this->getProjetoCount();
    }
    public function removeProjeto(projeto $_projeto_in) {
        $counter = 0;
        while (++$counter <= $this->getProjetoCount()) {
            if ($_projeto_in->getAuthorAndTitle() ==
                $this->_projeto[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getProjetoCount(); $x++) {
                    $this->_projeto[$x] = $this->_projeto[$x + 1];
                }
                $this->setProjetoCount($this->getProjetoCount() - 1);
            }
        }
        return $this->getProjetoCount();
    }


}
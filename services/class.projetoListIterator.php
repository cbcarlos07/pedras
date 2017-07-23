<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class projetoListIterator
{
    protected $projetoList;
    protected $currentProjeto = 0;

    public function __construct(projetoList $projetoList_in) {
        $this->projetoList = $projetoList_in;
    }
    public function getCurrentProjeto() {
        if (($this->currentProjeto > 0) &&
            ($this->projetoList->getProjetoCount() >= $this->currentProjeto)) {
            return $this->projetoList->getProjeto($this->currentProjeto);
        }
    }
    public function getNextProjeto() {
        if ($this->hasNextProjeto()) {
            return $this->projetoList->getProjeto(++$this->currentProjeto);
        } else {
            return NULL;
        }
    }
    public function hasNextProjeto() {
        if ($this->projetoList->getProjetoCount() > $this->currentProjeto) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
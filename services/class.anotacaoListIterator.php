<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class anotacaoListIterator
{
    protected $anotacaoList;
    protected $currentAnotacao = 0;

    public function __construct(anotacaoList $anotacaoList_in) {
        $this->anotacaoList = $anotacaoList_in;
    }
    public function getCurrentAnotacao() {
        if (($this->currentAnotacao > 0) &&
            ($this->anotacaoList->getAnotacaoCount() >= $this->currentAnotacao)) {
            return $this->anotacaoList->getAnotacao($this->currentAnotacao);
        }
    }
    public function getNextAnotacao() {
        if ($this->hasNextAnotacao()) {
            return $this->anotacaoList->getAnotacao(++$this->currentAnotacao);
        } else {
            return NULL;
        }
    }
    public function hasNextAnotacao() {
        if ($this->anotacaoList->getAnotacaoCount() > $this->currentAnotacao) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
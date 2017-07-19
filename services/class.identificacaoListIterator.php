<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class identificacaoListIterator
{
    protected $identificacaoList;
    protected $currentIdentificacao = 0;

    public function __construct(identificacaoList $identificacaoList_in) {
        $this->identificacaoList = $identificacaoList_in;
    }
    public function getCurrentIdentificacao() {
        if (($this->currentIdentificacao > 0) &&
            ($this->identificacaoList->getIdentificacaoCount() >= $this->currentIdentificacao)) {
            return $this->identificacaoList->getIdentificacao($this->currentIdentificacao);
        }
    }
    public function getNextIdentificacao() {
        if ($this->hasNextIdentificacao()) {
            return $this->identificacaoList->getIdentificacao(++$this->currentIdentificacao);
        } else {
            return NULL;
        }
    }
    public function hasNextIdentificacao() {
        if ($this->identificacaoList->getIdentificacaoCount() > $this->currentIdentificacao) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
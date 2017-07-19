<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class pagamentoListIterator
{
    protected $pagamentoList;
    protected $currentPagamento = 0;

    public function __construct(pagamentoList $pagamentoList_in) {
        $this->pagamentoList = $pagamentoList_in;
    }
    public function getCurrentPagamento() {
        if (($this->currentPagamento > 0) &&
            ($this->pagamentoList->getPagamentoCount() >= $this->currentPagamento)) {
            return $this->pagamentoList->getPagamento($this->currentPagamento);
        }
    }
    public function getNextPagamento() {
        if ($this->hasNextPagamento()) {
            return $this->pagamentoList->getPagamento(++$this->currentPagamento);
        } else {
            return NULL;
        }
    }
    public function hasNextPagamento() {
        if ($this->pagamentoList->getPagamentoCount() > $this->currentPagamento) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
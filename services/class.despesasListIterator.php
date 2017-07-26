<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class despesasListIterator
{
    protected $despesasList;
    protected $currentDespesas = 0;

    public function __construct(despesasList $despesasList_in) {
        $this->despesasList = $despesasList_in;
    }
    public function getCurrentDespesas() {
        if (($this->currentDespesas > 0) &&
            ($this->despesasList->getDespesasCount() >= $this->currentDespesas)) {
            return $this->despesasList->getDespesas($this->currentDespesas);
        }
    }
    public function getNextDespesas() {
        if ($this->hasNextDespesas()) {
            return $this->despesasList->getDespesas(++$this->currentDespesas);
        } else {
            return NULL;
        }
    }
    public function hasNextDespesas() {
        if ($this->despesasList->getDespesasCount() > $this->currentDespesas) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
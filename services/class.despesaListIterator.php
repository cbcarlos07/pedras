<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class despesaListIterator
{
    protected $despesasList;
    protected $currentDespesas = 0;

    public function __construct(despesaList $despesasList_in) {
        $this->despesasList = $despesasList_in;
    }
    public function getCurrentDespesas() {
        if (($this->currentDespesas > 0) &&
            ($this->despesasList->getDespesaCount() >= $this->currentDespesas)) {
            return $this->despesasList->getDespesa($this->currentDespesas);
        }
    }
    public function getNextDespesas() {
        if ($this->hasNextDespesas()) {
            return $this->despesasList->getDespesa(++$this->currentDespesas);
        } else {
            return NULL;
        }
    }
    public function hasNextDespesas() {
        if ($this->despesasList->getDespesaCount() > $this->currentDespesas) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
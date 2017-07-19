<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class filiacaoListIterator
{
    protected $filiacaoList;
    protected $currentFiliacao = 0;

    public function __construct(filiacaoList $filiacaoList_in) {
        $this->filiacaoList = $filiacaoList_in;
    }
    public function getCurrentFiliacao() {
        if (($this->currentFiliacao > 0) &&
            ($this->filiacaoList->getFiliacaoCount() >= $this->currentFiliacao)) {
            return $this->filiacaoList->getFiliacao($this->currentFiliacao);
        }
    }
    public function getNextFiliacao() {
        if ($this->hasNextFiliacao()) {
            return $this->filiacaoList->getFiliacao(++$this->currentFiliacao);
        } else {
            return NULL;
        }
    }
    public function hasNextFiliacao() {
        if ($this->filiacaoList->getFiliacaoCount() > $this->currentFiliacao) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
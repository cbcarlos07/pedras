<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class unidadeListIterator
{
    protected $unidadeList;
    protected $currentUnidade = 0;

    public function __construct(unidadeList $unidadeList_in) {
        $this->unidadeList = $unidadeList_in;
    }
    public function getCurrentUnidade() {
        if (($this->currentUnidade > 0) &&
            ($this->unidadeList->getUnidadeCount() >= $this->currentUnidade)) {
            return $this->unidadeList->getUnidade($this->currentUnidade);
        }
    }
    public function getNextUnidade() {
        if ($this->hasNextUnidade()) {
            return $this->unidadeList->getUnidade(++$this->currentUnidade);
        } else {
            return NULL;
        }
    }
    public function hasNextUnidade() {
        if ($this->unidadeList->getUnidadeCount() > $this->currentUnidade) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
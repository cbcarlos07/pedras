<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class liderancaListIterator
{
    protected $liderancaList;
    protected $currentLideranca = 0;

    public function __construct(liderancaList $liderancaList_in) {
        $this->liderancaList = $liderancaList_in;
    }
    public function getCurrentLideranca() {
        if (($this->currentLideranca > 0) &&
            ($this->liderancaList->getLiderancaCount() >= $this->currentLideranca)) {
            return $this->liderancaList->getLideranca($this->currentLideranca);
        }
    }
    public function getNextLideranca() {
        if ($this->hasNextLideranca()) {
            return $this->liderancaList->getLideranca(++$this->currentLideranca);
        } else {
            return NULL;
        }
    }
    public function hasNextLideranca() {
        if ($this->liderancaList->getLiderancaCount() > $this->currentLideranca) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class desbravadorListIterator
{
    protected $desbravadorList;
    protected $currentDesbravador = 0;

    public function __construct(desbravadorList $desbravadorList_in) {
        $this->desbravadorList = $desbravadorList_in;
    }
    public function getCurrentDesbravador() {
        if (($this->currentDesbravador > 0) &&
            ($this->desbravadorList->getDesbravadorCount() >= $this->currentDesbravador)) {
            return $this->desbravadorList->getDesbravador($this->currentDesbravador);
        }
    }
    public function getNextDesbravador() {
        if ($this->hasNextDesbravador()) {
            return $this->desbravadorList->getDesbravador(++$this->currentDesbravador);
        } else {
            return NULL;
        }
    }
    public function hasNextDesbravador() {
        if ($this->desbravadorList->getDesbravadorCount() > $this->currentDesbravador) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class ufListIterator
{
    protected $ufList;
    protected $currentUf = 0;

    public function __construct(ufList $ufList_in) {
        $this->ufList = $ufList_in;
    }
    public function getCurrentUf() {
        if (($this->currentUf > 0) &&
            ($this->ufList->getUfCount() >= $this->currentUf)) {
            return $this->ufList->getUf($this->currentUf);
        }
    }
    public function getNextUf() {
        if ($this->hasNextUf()) {
            return $this->ufList->getUf(++$this->currentUf);
        } else {
            return NULL;
        }
    }
    public function hasNextUf() {
        if ($this->ufList->getUfCount() > $this->currentUf) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
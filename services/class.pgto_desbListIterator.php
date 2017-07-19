<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class pgto_desbListIterator
{
    protected $pgto_desbList;
    protected $currentPgto_desb = 0;

    public function __construct(pgto_desbList $pgto_desbList_in) {
        $this->pgto_desbList = $pgto_desbList_in;
    }
    public function getCurrentPgto_desb() {
        if (($this->currentPgto_desb > 0) &&
            ($this->pgto_desbList->getPgto_desbCount() >= $this->currentPgto_desb)) {
            return $this->pgto_desbList->getPgto_desb($this->currentPgto_desb);
        }
    }
    public function getNextPgto_desb() {
        if ($this->hasNextPgto_desb()) {
            return $this->pgto_desbList->getPgto_desb(++$this->currentPgto_desb);
        } else {
            return NULL;
        }
    }
    public function hasNextPgto_desb() {
        if ($this->pgto_desbList->getPgto_desbCount() > $this->currentPgto_desb) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class espec_desbListIterator
{
    protected $espec_desbList;
    protected $currentEspec_desb = 0;

    public function __construct(espec_desbList $espec_desbList_in) {
        $this->espec_desbList = $espec_desbList_in;
    }
    public function getCurrentEspec_desb() {
        if (($this->currentEspec_desb > 0) &&
            ($this->espec_desbList->getEspec_desbCount() >= $this->currentEspec_desb)) {
            return $this->espec_desbList->getEspec_desb($this->currentEspec_desb);
        }
    }
    public function getNextEspec_desb() {
        if ($this->hasNextEspec_desb()) {
            return $this->espec_desbList->getEspec_desb(++$this->currentEspec_desb);
        } else {
            return NULL;
        }
    }
    public function hasNextEspec_desb() {
        if ($this->espec_desbList->getEspec_desbCount() > $this->currentEspec_desb) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
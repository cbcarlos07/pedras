<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class fone_desbListIterator
{
    protected $fone_desbList;
    protected $currentFone_desb = 0;

    public function __construct(fone_desbList $fone_desbList_in) {
        $this->fone_desbList = $fone_desbList_in;
    }
    public function getCurrentFone_desb() {
        if (($this->currentFone_desb > 0) &&
            ($this->fone_desbList->getFone_desbCount() >= $this->currentFone_desb)) {
            return $this->fone_desbList->getFone_desb($this->currentFone_desb);
        }
    }
    public function getNextFone_desb() {
        if ($this->hasNextFone_desb()) {
            return $this->fone_desbList->getFone_desb(++$this->currentFone_desb);
        } else {
            return NULL;
        }
    }
    public function hasNextFone_desb() {
        if ($this->fone_desbList->getFone_desbCount() > $this->currentFone_desb) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class religiaoListIterator
{
    protected $religiaoList;
    protected $currentReligiao = 0;

    public function __construct(religiaoList $religiaoList_in) {
        $this->religiaoList = $religiaoList_in;
    }
    public function getCurrentReligiao() {
        if (($this->currentReligiao > 0) &&
            ($this->religiaoList->getReligiaoCount() >= $this->currentReligiao)) {
            return $this->religiaoList->getReligiao($this->currentReligiao);
        }
    }
    public function getNextReligiao() {
        if ($this->hasNextReligiao()) {
            return $this->religiaoList->getReligiao(++$this->currentReligiao);
        } else {
            return NULL;
        }
    }
    public function hasNextReligiao() {
        if ($this->religiaoList->getReligiaoCount() > $this->currentReligiao) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
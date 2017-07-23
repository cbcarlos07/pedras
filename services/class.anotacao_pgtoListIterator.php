<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class anotacao_pgtoListIterator
{
    protected $anotacao_pgtoList;
    protected $currentAnotacao_pgto = 0;

    public function __construct(anotacao_pgtoList $anotacao_pgtoList_in) {
        $this->anotacao_pgtoList = $anotacao_pgtoList_in;
    }
    public function getCurrentAnotacao_pgto() {
        if (($this->currentAnotacao_pgto > 0) &&
            ($this->anotacao_pgtoList->getAnotacao_pgtoCount() >= $this->currentAnotacao_pgto)) {
            return $this->anotacao_pgtoList->getAnotacao_pgto($this->currentAnotacao_pgto);
        }
    }
    public function getNextAnotacao_pgto() {
        if ($this->hasNextAnotacao_pgto()) {
            return $this->anotacao_pgtoList->getAnotacao_pgto(++$this->currentAnotacao_pgto);
        } else {
            return NULL;
        }
    }
    public function hasNextAnotacao_pgto() {
        if ($this->anotacao_pgtoList->getAnotacao_pgtoCount() > $this->currentAnotacao_pgto) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
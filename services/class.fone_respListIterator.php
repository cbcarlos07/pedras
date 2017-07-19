<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class fone_respListIterator
{
    protected $fone_respList;
    protected $currentFone_resp = 0;

    public function __construct(fone_respList $fone_respList_in) {
        $this->fone_respList = $fone_respList_in;
    }
    public function getCurrentFone_resp() {
        if (($this->currentFone_resp > 0) &&
            ($this->fone_respList->getFone_respCount() >= $this->currentFone_resp)) {
            return $this->fone_respList->getFone_resp($this->currentFone_resp);
        }
    }
    public function getNextFone_resp() {
        if ($this->hasNextFone_resp()) {
            return $this->fone_respList->getFone_resp(++$this->currentFone_resp);
        } else {
            return NULL;
        }
    }
    public function hasNextFone_resp() {
        if ($this->fone_respList->getFone_respCount() > $this->currentFone_resp) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
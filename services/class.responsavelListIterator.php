<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class responsavelListIterator
{
    protected $responsavelList;
    protected $currentResponsavel = 0;

    public function __construct(responsavelList $responsavelList_in) {
        $this->responsavelList = $responsavelList_in;
    }
    public function getCurrentResponsavel() {
        if (($this->currentResponsavel > 0) &&
            ($this->responsavelList->getResponsavelCount() >= $this->currentResponsavel)) {
            return $this->responsavelList->getResponsavel($this->currentResponsavel);
        }
    }
    public function getNextResponsavel() {
        if ($this->hasNextResponsavel()) {
            return $this->responsavelList->getResponsavel(++$this->currentResponsavel);
        } else {
            return NULL;
        }
    }
    public function hasNextResponsavel() {
        if ($this->responsavelList->getResponsavelCount() > $this->currentResponsavel) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
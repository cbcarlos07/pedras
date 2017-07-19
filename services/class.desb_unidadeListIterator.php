<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class desb_unidadeListIterator
{
    protected $desb_unidadeList;
    protected $currentDesb_unidade = 0;

    public function __construct(desb_unidadeList $desb_unidadeList_in) {
        $this->desb_unidadeList = $desb_unidadeList_in;
    }
    public function getCurrentDesb_unidade() {
        if (($this->currentDesb_unidade > 0) &&
            ($this->desb_unidadeList->getDesb_unidadeCount() >= $this->currentDesb_unidade)) {
            return $this->desb_unidadeList->getDesb_unidade($this->currentDesb_unidade);
        }
    }
    public function getNextDesb_unidade() {
        if ($this->hasNextDesb_unidade()) {
            return $this->desb_unidadeList->getDesb_unidade(++$this->currentDesb_unidade);
        } else {
            return NULL;
        }
    }
    public function hasNextDesb_unidade() {
        if ($this->desb_unidadeList->getDesb_unidadeCount() > $this->currentDesb_unidade) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
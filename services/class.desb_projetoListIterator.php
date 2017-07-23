<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class desb_projetoListIterator
{
    protected $desb_projetoList;
    protected $currentDesb_projeto = 0;

    public function __construct(desb_projetoList $desb_projetoList_in) {
        $this->desb_projetoList = $desb_projetoList_in;
    }
    public function getCurrentDesb_projeto() {
        if (($this->currentDesb_projeto > 0) &&
            ($this->desb_projetoList->getDesb_projetoCount() >= $this->currentDesb_projeto)) {
            return $this->desb_projetoList->getDesb_projeto($this->currentDesb_projeto);
        }
    }
    public function getNextDesb_projeto() {
        if ($this->hasNextDesb_projeto()) {
            return $this->desb_projetoList->getDesb_projeto(++$this->currentDesb_projeto);
        } else {
            return NULL;
        }
    }
    public function hasNextDesb_projeto() {
        if ($this->desb_projetoList->getDesb_projetoCount() > $this->currentDesb_projeto) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class desb_cargoListIterator
{
    protected $desb_cargoList;
    protected $currentDesb_cargo = 0;

    public function __construct(desb_cargoList $desb_cargoList_in) {
        $this->desb_cargoList = $desb_cargoList_in;
    }
    public function getCurrentDesb_cargo() {
        if (($this->currentDesb_cargo > 0) &&
            ($this->desb_cargoList->getDesb_cargoCount() >= $this->currentDesb_cargo)) {
            return $this->desb_cargoList->getDesb_cargo($this->currentDesb_cargo);
        }
    }
    public function getNextDesb_cargo() {
        if ($this->hasNextDesb_cargo()) {
            return $this->desb_cargoList->getDesb_cargo(++$this->currentDesb_cargo);
        } else {
            return NULL;
        }
    }
    public function hasNextDesb_cargo() {
        if ($this->desb_cargoList->getDesb_cargoCount() > $this->currentDesb_cargo) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
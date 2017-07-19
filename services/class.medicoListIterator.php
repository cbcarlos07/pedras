<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class medicoListIterator
{
    protected $medicoList;
    protected $currentMedico = 0;

    public function __construct(medicoList $medicoList_in) {
        $this->medicoList = $medicoList_in;
    }
    public function getCurrentMedico() {
        if (($this->currentMedico > 0) &&
            ($this->medicoList->getMedicoCount() >= $this->currentMedico)) {
            return $this->medicoList->getMedico($this->currentMedico);
        }
    }
    public function getNextMedico() {
        if ($this->hasNextMedico()) {
            return $this->medicoList->getMedico(++$this->currentMedico);
        } else {
            return NULL;
        }
    }
    public function hasNextMedico() {
        if ($this->medicoList->getMedicoCount() > $this->currentMedico) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
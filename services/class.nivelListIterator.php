<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class nivelListIterator
{
    protected $nivelList;
    protected $currentNivel = 0;

    public function __construct(nivelList $nivelList_in) {
        $this->nivelList = $nivelList_in;
    }
    public function getCurrentNivel() {
        if (($this->currentNivel > 0) &&
            ($this->nivelList->getNivelCount() >= $this->currentNivel)) {
            return $this->nivelList->getNivel($this->currentNivel);
        }
    }
    public function getNextNivel() {
        if ($this->hasNextNivel()) {
            return $this->nivelList->getNivel(++$this->currentNivel);
        } else {
            return NULL;
        }
    }
    public function hasNextNivel() {
        if ($this->nivelList->getNivelCount() > $this->currentNivel) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
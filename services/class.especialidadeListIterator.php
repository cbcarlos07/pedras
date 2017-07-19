<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class especialidadeListIterator
{
    protected $especialidadeList;
    protected $currentEspecialidade = 0;

    public function __construct(especialidadeList $especialidadeList_in) {
        $this->especialidadeList = $especialidadeList_in;
    }
    public function getCurrentEspecialidade() {
        if (($this->currentEspecialidade > 0) &&
            ($this->especialidadeList->getEspecialidadeCount() >= $this->currentEspecialidade)) {
            return $this->especialidadeList->getEspecialidade($this->currentEspecialidade);
        }
    }
    public function getNextEspecialidade() {
        if ($this->hasNextEspecialidade()) {
            return $this->especialidadeList->getEspecialidade(++$this->currentEspecialidade);
        } else {
            return NULL;
        }
    }
    public function hasNextEspecialidade() {
        if ($this->especialidadeList->getEspecialidadeCount() > $this->currentEspecialidade) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
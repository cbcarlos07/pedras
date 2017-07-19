<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class cursoListIterator
{
    protected $cursoList;
    protected $currentCurso = 0;

    public function __construct(cursoList $cursoList_in) {
        $this->cursoList = $cursoList_in;
    }
    public function getCurrentCurso() {
        if (($this->currentCurso > 0) &&
            ($this->cursoList->getCursoCount() >= $this->currentCurso)) {
            return $this->cursoList->getCurso($this->currentCurso);
        }
    }
    public function getNextCurso() {
        if ($this->hasNextCurso()) {
            return $this->cursoList->getCurso(++$this->currentCurso);
        } else {
            return NULL;
        }
    }
    public function hasNextCurso() {
        if ($this->cursoList->getCursoCount() > $this->currentCurso) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
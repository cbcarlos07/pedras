<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class classesListIterator
{
    protected $classesList;
    protected $currentClasses = 0;

    public function __construct(classesList $classesList_in) {
        $this->classesList = $classesList_in;
    }
    public function getCurrentClasses() {
        if (($this->currentClasses > 0) &&
            ($this->classesList->getClassesCount() >= $this->currentClasses)) {
            return $this->classesList->getClasses($this->currentClasses);
        }
    }
    public function getNextClasses() {
        if ($this->hasNextClasses()) {
            return $this->classesList->getClasses(++$this->currentClasses);
        } else {
            return NULL;
        }
    }
    public function hasNextClasses() {
        if ($this->classesList->getClassesCount() > $this->currentClasses) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
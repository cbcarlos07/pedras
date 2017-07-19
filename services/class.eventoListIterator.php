<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class eventoListIterator
{
    protected $eventoList;
    protected $currentEvento = 0;

    public function __construct(eventoList $eventoList_in) {
        $this->eventoList = $eventoList_in;
    }
    public function getCurrentEvento() {
        if (($this->currentEvento > 0) &&
            ($this->eventoList->getEventoCount() >= $this->currentEvento)) {
            return $this->eventoList->getEvento($this->currentEvento);
        }
    }
    public function getNextEvento() {
        if ($this->hasNextEvento()) {
            return $this->eventoList->getEvento(++$this->currentEvento);
        } else {
            return NULL;
        }
    }
    public function hasNextEvento() {
        if ($this->eventoList->getEventoCount() > $this->currentEvento) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
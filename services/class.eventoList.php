<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class eventoList
{
    private $_evento;
    private $_eventoCount;

    /**
     * EventoList constructor.
     * @param $_evento
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getEventoCount()
    {
        return $this->_eventoCount;
    }

    /**
     * @param mixed $eventoCount
     * @return EventoList
     */
    public function setEventoCount($newCount)
    {
        $this->_eventoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvento($_eventoNumberToGet)
    {
        if((is_numeric($_eventoNumberToGet)) && ($_eventoNumberToGet <= $this->getEventoCount())){
            return $this->_evento[$_eventoNumberToGet];
        }else{
            return null;
        }
    }

    public function addEvento(Evento $_evento_in) {
        $this->setEventoCount($this->getEventoCount() + 1);
        $this->_evento[$this->getEventoCount()] = $_evento_in;
        return $this->getEventoCount();
    }
    public function removeEvento(Evento $_evento_in) {
        $counter = 0;
        while (++$counter <= $this->getEventoCount()) {
            if ($_evento_in->getAuthorAndTitle() ==
                $this->_evento[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getEventoCount(); $x++) {
                    $this->_evento[$x] = $this->_evento[$x + 1];
                }
                $this->setEventoCount($this->getEventoCount() - 1);
            }
        }
        return $this->getEventoCount();
    }


}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 17:02
 */
class investiduraListIterator
{
    protected $investiduraList;
    protected $currentCargo = 0;

    public function __construct(investiduraList $investiduraList_in) {
        $this->investiduraList = $investiduraList_in;
    }
    public function getCurrentCargo() {
        if (($this->currentCargo > 0) &&
            ($this->investiduraList->getCargoCount() >= $this->currentCargo)) {
            return $this->investiduraList->getCargo($this->currentCargo);
        }
    }
    public function getNextCargo() {
        if ($this->hasNextCargo()) {
            return $this->investiduraList->getCargo(++$this->currentCargo);
        } else {
            return NULL;
        }
    }
    public function hasNextCargo() {
        if ($this->investiduraList->getInvestiduraCount() > $this->currentCargo) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
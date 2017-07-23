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
    protected $currentInvestidura = 0;

    public function __construct(investiduraList $investiduraList_in) {
        $this->investiduraList = $investiduraList_in;
    }
    public function getCurrentInvestidura() {
        if (($this->currentInvestidura > 0) &&
            ($this->investiduraList->getInvestiduraCount() >= $this->currentInvestidura)) {
            return $this->investiduraList->getInvestidura($this->currentInvestidura);
        }
    }
    public function getNextInvestidura() {
        if ($this->hasNextInvestidura()) {
            return $this->investiduraList->getInvestidura(++$this->currentInvestidura);
        } else {
            return NULL;
        }
    }
    public function hasNextInvestidura() {
        if ($this->investiduraList->getInvestiduraCount() > $this->currentInvestidura) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
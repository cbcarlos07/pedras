<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class fone_respList
{
    private $_fone_resp;
    private $_fone_respCount;

    /**
     * Fone_respList constructor.
     * @param $_fone_resp
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getFone_respCount()
    {
        return $this->_fone_respCount;
    }

    /**
     * @param mixed $fone_respCount
     * @return Fone_respList
     */
    public function setFone_respCount($newCount)
    {
        $this->_fone_respCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone_resp($_fone_respNumberToGet)
    {
        if((is_numeric($_fone_respNumberToGet)) && ($_fone_respNumberToGet <= $this->getFone_respCount())){
            return $this->_fone_resp[$_fone_respNumberToGet];
        }else{
            return null;
        }
    }

    public function addFone_resp(Fone_resp $_fone_resp_in) {
        $this->setFone_respCount($this->getFone_respCount() + 1);
        $this->_fone_resp[$this->getFone_respCount()] = $_fone_resp_in;
        return $this->getFone_respCount();
    }
    public function removeFone_resp(Fone_resp $_fone_resp_in) {
        $counter = 0;
        while (++$counter <= $this->getFone_respCount()) {
            if ($_fone_resp_in->getAuthorAndTitle() ==
                $this->_fone_resp[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getFone_respCount(); $x++) {
                    $this->_fone_resp[$x] = $this->_fone_resp[$x + 1];
                }
                $this->setFone_respCount($this->getFone_respCount() - 1);
            }
        }
        return $this->getFone_respCount();
    }


}
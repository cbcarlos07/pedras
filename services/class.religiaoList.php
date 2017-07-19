<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class religiaoList
{
    private $_religiao;
    private $_religiaoCount;

    /**
     * ReligiaoList constructor.
     * @param $_religiao
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getReligiaoCount()
    {
        return $this->_religiaoCount;
    }

    /**
     * @param mixed $religiaoCount
     * @return ReligiaoList
     */
    public function setReligiaoCount($newCount)
    {
        $this->_religiaoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReligiao($_religiaoNumberToGet)
    {
        if((is_numeric($_religiaoNumberToGet)) && ($_religiaoNumberToGet <= $this->getReligiaoCount())){
            return $this->_religiao[$_religiaoNumberToGet];
        }else{
            return null;
        }
    }

    public function addReligiao(religiao $_religiao_in) {
        $this->setReligiaoCount($this->getReligiaoCount() + 1);
        $this->_religiao[$this->getReligiaoCount()] = $_religiao_in;
        return $this->getReligiaoCount();
    }
    public function removeReligiao(religiao $_religiao_in) {
        $counter = 0;
        while (++$counter <= $this->getReligiaoCount()) {
            if ($_religiao_in->getAuthorAndTitle() ==
                $this->_religiao[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getReligiaoCount(); $x++) {
                    $this->_religiao[$x] = $this->_religiao[$x + 1];
                }
                $this->setReligiaoCount($this->getReligiaoCount() - 1);
            }
        }
        return $this->getReligiaoCount();
    }


}
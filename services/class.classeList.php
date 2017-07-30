<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class classeList
{
    private $_classes;
    private $_classesCount;

    /**
     * ClassesList constructor.
     * @param $_classes
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getClassesCount()
    {
        return $this->_classesCount;
    }

    /**
     * @param mixed $classesCount
     * @return ClasseList
     */
    public function setClassesCount($newCount)
    {
        $this->_classesCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClasses($_classesNumberToGet)
    {
        if((is_numeric($_classesNumberToGet)) && ($_classesNumberToGet <= $this->getClassesCount())){
            return $this->_classes[$_classesNumberToGet];
        }else{
            return null;
        }
    }


    public function addClasses(classe $_classes_in) {
        $this->setClassesCount($this->getClassesCount() + 1);
        $this->_classes[$this->getClassesCount()] = $_classes_in;
        return $this->getClassesCount();
    }
    public function removeClasses(classe $_classes_in) {
        $counter = 0;
        while (++$counter <= $this->getClassesCount()) {
            if ($_classes_in->getAuthorAndTitle() ==
                $this->_classes[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getClassesCount(); $x++) {
                    $this->_classes[$x] = $this->_classes[$x + 1];
                }
                $this->setClassesCount($this->getClassesCount() - 1);
            }
        }
        return $this->getClassesCount();
    }


}
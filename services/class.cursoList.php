<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 17/02/17
 * Time: 16:49
 */
class cursoList
{
    private $_curso;
    private $_cursoCount;

    /**
     * CursoList constructor.
     * @param $_curso
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCursoCount()
    {
        return $this->_cursoCount;
    }

    /**
     * @param mixed $cursoCount
     * @return CursoList
     */
    public function setCursoCount($newCount)
    {
        $this->_cursoCount = $newCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurso($_cursoNumberToGet)
    {
        if((is_numeric($_cursoNumberToGet)) && ($_cursoNumberToGet <= $this->getCursoCount())){
            return $this->_curso[$_cursoNumberToGet];
        }else{
            return null;
        }
    }

    public function addCurso(Curso $_curso_in) {
        $this->setCursoCount($this->getCursoCount() + 1);
        $this->_curso[$this->getCursoCount()] = $_curso_in;
        return $this->getCursoCount();
    }
    public function removeCurso(Curso $_curso_in) {
        $counter = 0;
        while (++$counter <= $this->getCursoCount()) {
            if ($_curso_in->getAuthorAndTitle() ==
                $this->_curso[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getCursoCount(); $x++) {
                    $this->_curso[$x] = $this->_curso[$x + 1];
                }
                $this->setCursoCount($this->getCursoCount() - 1);
            }
        }
        return $this->getCursoCount();
    }


}
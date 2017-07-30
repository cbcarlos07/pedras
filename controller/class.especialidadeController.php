<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 29/07/17
 * Time: 21:04
 */
class especialidadeController
{
    public function insert( especialidade $especialidade ){
        require_once "../model/class.especialidade.php";
        $apd = new especialidadeDao();
        $retorno = $apd->insert( $especialidade );
        return $retorno;
    }

    public function update( especialidade $especialidade ){
        require_once "../model/class.especialidade.php";
        $apd = new especialidadeDao();
        $retorno = $apd->update( $especialidade );
        return $retorno;
    }
    public function delete( $especialidade ){
        require_once "../model/class.especialidade.php";
        $apd = new especialidadeDao();
        $retorno = $apd->delete( $especialidade );
        return $retorno;
    }
    public function getEspecialidade ( $especialidade ){
        require_once "../model/class.especialidade.php";
        $apd = new especialidadeDao();
        $retorno = $apd->getEspecialidade( $especialidade );
        return $retorno;
    }
    public function getListEspecialidade ( $especialidade ){
        require_once "../model/class.especialidade.php";
        $apd = new especialidadeDao();
        $retorno = $apd->getListEspecialidade( $especialidade );
        return $retorno;
    }
}
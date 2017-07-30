<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class cursoDao
{
    private $connection =  null;
  public function insert( curso $curso ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO curso (DS_CURSO) VALUES (:curso)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":curso", $curso->getDsCurso(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( curso $curso ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE curso SET DS_CURSO = :curso WHERE CD_CURSO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":curso", $curso->getDsCurso(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $curso->getCdCurso(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $curso ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM curso WHERE CD_CURSO = :curso";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":curso", $curso, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getCurso ( $curso ){
        require_once "class.connection.php";
        require_once "../model/class.curso.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM curso WHERE CD_CURSO = :curso";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":curso", $curso, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new curso();
                $retorno->setCdCurso( $row['CD_CURSO'] );
                $retorno->setDsCurso( $row['DS_CURSO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListCurso ( $curso ){
        require_once "class.connection.php";
        require_once "../model/class.curso.php";
        require_once "../services/class.cursoList.php";
        $retorno = new cursoList();
        $this->connection = new connection();

        try{
            if( $curso == "" ){
                $query = "SELECT * FROM curso";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM curso WHERE DS_CURSO LIKE :curso";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":curso", "%$curso%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new curso();
                $level->setCdCurso( $row['CD_CURSO'] );
                $level->setDsCurso( $row['DS_CURSO'] );
                $retorno->addCurso( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
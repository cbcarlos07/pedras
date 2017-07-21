<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class especialidadeDao
{
    private $connection =  null;
  public function insert( especialidade $especialidade ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO especialidade (DS_ESPECIALIDADE) VALUES (:especialidade)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":especialidade", $especialidade->getDsEspecialidade(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( especialidade $especialidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE especialidade SET DS_ESPECIALIDADE = :especialidade WHERE CD_ESPECIALIDADE = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":especialidade", $especialidade->getDsEspecialidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $especialidade->getCdEspecialidade(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $especialidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM especialidade WHERE CD_ESPECIALIDADE = :especialidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":especialidade", $especialidade, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getEspecialidade ( $especialidade ){
        require_once "class.connection.php";
        require_once "../model/class.especialidade.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM especialidade WHERE CD_ESPECIALIDADE = :especialidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":especialidade", $especialidade, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new especialidade();
                $retorno->setCdEspecialidade( $row['CD_ESPECIALIDADE'] );
                $retorno->setDsEspecialidade( $row['DS_ESPECIALIDADE'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListEspecialidade ( $especialidade ){
        require_once "class.connection.php";
        require_once "../model/class.especialidade.php";
        require_once "../services/class.especialidadeList.php";
        $retorno = new especialidadeList();
        $this->connection = new connection();

        try{
            if( $especialidade == "" ){
                $query = "SELECT * FROM especialidade";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM especialidade WHERE DS_ESPECIALIDADE LIKE :especialidade";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":especialidade", "%$especialidade%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new especialidade();
                $level->setCdEspecialidade( $row['CD_ESPECIALIDADE'] );
                $level->setDsEspecialidade( $row['DS_ESPECIALIDADE'] );
                $retorno->addEspecialidade( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
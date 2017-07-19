<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class classesDao
{
    private $connection =  null;
  public function insert( classes $classe ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO classes (DS_CLASSE, TP_CLASSE) VALUES (:classe, :tipo)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":classe", $classe->getDsClasse(), PDO::PARAM_STR );
            $stmt->bindValue( ":tipo", $classe->getTpClasse(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( classes $classe ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE classes SET DS_CLASSE = :classe, TP_CLASSE = :tipo WHERE CD_CLASSE = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":classe", $classe->getDsClasse(), PDO::PARAM_STR );
            $stmt->bindValue( ":tipo", $classe->getTpClasse(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $classe->getCdClasse(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $classe ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM classes WHERE CD_CLASSE = :classe";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":classe", $classe, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUf ( $classe ){
        require_once "class.connection.php";
        require_once "../model/class.classes.php";
        require_once "../model/class.uf.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM classes WHERE CD_CLASSE = :classe";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":classe", $classe, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new classes();
                $retorno->setCdClasse( $row['CD_CLASSE'] );
                $retorno->setDsClasse( $row['DS_CLASSE'] );
                $retorno->setTpClasse( $row['TP_CLASSE'] );


            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListUf ( $classe ){
        require_once "class.connection.php";
        require_once "../model/class.classes.php";
        require_once "../services/class.classesList.php";
        $retorno = new classesList();
        $this->connection = new connection();

        try{
            if( $classe == "" ){
                $query = "SELECT * FROM classes";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM classes WHERE DS_CLASSE LIKE :classe";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":classe", "%$classe%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new classes();
                $level->setCdClasse( $row['CD_CLASSE'] );
                $level->setDsClasse( $row['DS_CLASSE'] );
                $level->setTpClasse( $row['TP_CLASSE'] );
                $retorno->addClasses( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
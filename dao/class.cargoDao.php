<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class cargoDao
{
    private $connection =  null;
  public function insert( cargo $cargo ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO cargo (DS_CARGO) VALUES (:cargo)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cargo", $cargo->getDsCargo(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( cargo $cargo ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE cargo SET DS_CARGO = :cargo WHERE CD_CARGO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cargo", $cargo->getDsCargo(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $cargo->getCdCargo(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $cargo ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM cargo WHERE CD_CARGO = :cargo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cargo", $cargo, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getCargo ( $cargo ){
        require_once "class.connection.php";
        require_once "../model/class.cargo.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM cargo WHERE CD_CARGO = :cargo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cargo", $cargo, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new cargo();
                $retorno->setCdCargo( $row['CD_CARGO'] );
                $retorno->setDsCargo( $row['DS_CARGO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListCargo ( $cargo ){
        require_once "class.connection.php";
        require_once "../model/class.cargo.php";
        require_once "../services/class.cargoList.php";
        $retorno = new cargoList();
        $this->connection = new connection();

        try{
            if( $cargo == "" ){
                $query = "SELECT * FROM cargo";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM cargo WHERE DS_CARGO LIKE :cargo";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":cargo", "%$cargo%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new cargo();
                $level->setCdCargo( $row['CD_CARGO'] );
                $level->setDsCargo( $row['DS_CARGO'] );
                $retorno->addCargo( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
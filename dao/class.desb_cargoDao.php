<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class desb_cargoDao
{
    private $connection =  null;
  public function insert( desb_cargo $desb_cargo ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO desb_cargo (CD_CARGO, CD_DESB) VALUES (:cargo, :desb)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cargo", $desb_cargo->getCargo()->getCdCargo(), PDO::PARAM_INT );
            $stmt->bindValue( ":desb", $desb_cargo->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( desb_cargo $desb_cargo ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE desb_cargo SET CD_CARGO = :cargo, CD_DESB = :desb WHERE CD_CARGO = :cdcargo AND CD_DESB = :cddesb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cdcargo", $desb_cargo->getCargo()->getCdCargo(), PDO::PARAM_INT );
            $stmt->bindValue( ":cddesb", $desb_cargo->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $desb_cargo ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM desb_cargo WHERE CD_CARGO = :desb_cargo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_cargo", $desb_cargo, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getCargo ( $desb_cargo ){
        require_once "class.connection.php";
        require_once "../model/class.desb_cargo.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.cargo.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM desb_cargo WHERE CD_CARGO = :desb_cargo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_cargo", $desb_cargo, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new desb_cargo();
                $retorno->setCargo( new cargo() );
                $retorno->getCargo()->setCdCargo( $row['CD_CARGO'] );
                $retorno->setDesbravador( new desbravador() );
                $retorno->getDesbravador()->setCdDesb( $row['CD_CARGO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListCargo ( $desb_cargo ){
        require_once "class.connection.php";
        require_once "../model/class.desb_cargo.php";
        require_once "../services/class.desb_cargoList.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.cargo.php";
        $retorno = new desb_cargoList();
        $this->connection = new connection();

        try{
            if( $desb_cargo == "" ){
                $query = "SELECT * FROM desb_cargo";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM desb_cargo WHERE CD_CARGO LIKE :desb_cargo";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":desb_cargo", "%$desb_cargo%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new desb_cargo();
                $level->getCargo()->setCdCargo( $row['CD_CARGO'] );
                $level->setDesbravador( new desbravador() );
                $level->getDesbravador()->setCdDesb( $row['CD_CARGO'] );
                $retorno->addDesb_cargo( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class desb_unidadeDao
{
    private $connection =  null;
  public function insert( desb_unidade $desb_unidade ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO desb_unidade (CD_UNIDADE, CD_DESB) VALUES (:unidade, :desb)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":unidade", $desb_unidade->getUnidade()->getCdUnidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":desb", $desb_unidade->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( desb_unidade $desb_unidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE desb_unidade SET CD_UNIDADE = :unidade, CD_DESB = :desb WHERE CD_UNIDADE = :cdcargo AND CD_DESB = :cddesb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cdcargo", $desb_unidade->getUnidade()->getCdUnidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":cddesb", $desb_unidade->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $desb_unidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM desb_unidade WHERE CD_UNIDADE = :desb_unidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_unidade", $desb_unidade, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUnidade ( $desb_unidade ){
        require_once "class.connection.php";
        require_once "../model/class.desb_unidade.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.cargo.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM desb_unidade WHERE CD_UNIDADE = :desb_unidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_unidade", $desb_unidade, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new desb_unidade();
                $retorno->setUnidade( new cargo() );
                $retorno->getUnidade()->setCdCargo( $row['CD_UNIDADE'] );
                $retorno->setDesbravador( new desbravador() );
                $retorno->getDesbravador()->setCdDesb( $row['CD_UNIDADE'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListCargo ( $desb_unidade ){
        require_once "class.connection.php";
        require_once "../model/class.desb_unidade.php";
        require_once "../services/class.desb_unidadeList.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.cargo.php";
        $retorno = new desb_unidadeList();
        $this->connection = new connection();

        try{
            if( $desb_unidade == "" ){
                $query = "SELECT * FROM desb_unidade";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM desb_unidade WHERE CD_UNIDADE LIKE :desb_unidade";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":desb_unidade", "%$desb_unidade%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new desb_unidade();
                $level->getUnidade()->setCdCargo( $row['CD_UNIDADE'] );
                $level->setDesbravador( new desbravador() );
                $level->getDesbravador()->setCdDesb( $row['CD_UNIDADE'] );
                $retorno->addDesb_unidade( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
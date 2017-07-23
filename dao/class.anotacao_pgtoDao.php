<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class anotacao_pgtoDao
{
    private $connection =  null;
  public function insert( anotacao_pgto $anotacao_pgto ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO anotacao_pgto
                          (CD_ANOTACAO, NR_VALOR, DT_PGTO) 
                          VALUES 
                          (:anotacao, :valor, :dtpg)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $anotacao_pgto->getAnotacao()->getCdAnotacao(), PDO::PARAM_INT );
            $stmt->bindValue( ":valor", $anotacao_pgto->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $anotacao_pgto->getDtPgto(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( anotacao_pgto $anotacao_pgto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE anotacao_pgto SET 
                       NR_VALOR = :valor
                      ,DT_PGTO = :dtpgto
                       WHERE CD_ANOTACAO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":valor", $anotacao_pgto->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtpgto", $anotacao_pgto->getDtPgto(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $anotacao_pgto->getAnotacao()->getCdAnotacao(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $anotacao_pgto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM anotacao_pgto WHERE CD_ANOTACAO = :anotacao_pgto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":anotacao_pgto", $anotacao_pgto, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getAnotacao ( $anotacao_pgto ){
        require_once "class.connection.php";
        require_once "../model/class.anotacao_pgto.php";
        require_once "../model/class.desbravador.php";

        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM anotacao_pgto WHERE CD_ANOTACAO = :anotacao_pgto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":anotacao_pgto", $anotacao_pgto, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new anotacao_pgto();
                $obj->setAnotacao( new anotacao() );
                $obj->getAnotacao()->setCdAnotacao( $row['CD_ANOTACAO'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setDtPgto( $row['DT_PGTO'] );


            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListAnotacao ( $anotacao_pgto ){
        require_once "class.connection.php";
        require_once "../model/class.anotacao_pgto.php";
        require_once "../services/class.anotacao_pgtoList.php";
        $retorno = new anotacao_pgtoList();
        $this->connection = new connection();

        try{
            if( $anotacao_pgto == "" ){
                $query = "SELECT * FROM anotacao_pgto";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM anotacao_pgto WHERE OBS_ANOTACAO LIKE :anotacao_pgto";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":anotacao_pgto", "%$anotacao_pgto%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new anotacao_pgto();
                $obj->setAnotacao( new anotacao() );
                $obj->getAnotacao()->setCdAnotacao( $row['CD_ANOTACAO'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setDtPgto( $row['DT_PGTO'] );
                $retorno->addAnotacao_pgto( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
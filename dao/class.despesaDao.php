<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class despesaDao
{
    private $connection =  null;
  public function insert( despesa $despesa ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO despesa 
                        (CD_PGTO, NR_VALOR, DS_DESPESA) 
                        VALUES 
                        (:CD_PGTO, :NR_VALOR, :DS_DESPESA)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_PGTO", $despesa->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->bindValue( ":NR_VALOR", $despesa->getNrValor(), PDO::PARAM_STR);
            $stmt->bindValue( ":DS_DESPESA", $despesa->getDsDespesa(), PDO::PARAM_STR);
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( despesa $despesa ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE despesa SET 
                      CD_PGTO    = :CD_PGTO
                     ,NR_VALOR   = :NR_VALOR
                     ,DS_DESPESA = :DS_DESPESA 
                     WHERE CD_PGTO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_PGTO", $despesa->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->bindValue( ":NR_VALOR", $despesa->getNrValor(), PDO::PARAM_STR);
            $stmt->bindValue( ":DS_DESPESA", $despesa->getDsDespesa(), PDO::PARAM_STR);
            $stmt->bindValue( ":codigo", $despesa->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $despesa ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM despesa WHERE CD_PGTO = :despesa";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":despesa", $despesa, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getDespesa ( $despesa ){
        require_once "class.connection.php";
        require_once "../model/class.despesa.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM despesa WHERE CD_PGTO = :despesa";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":despesa", $despesa, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new despesa();
                $obj->setPgtoDesb( new pgto_desb() );
                $obj->getPgtoDesb()->setCdPgto( $row['CD_PGTO'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setDsDespesa( $row['DS_DESPESA'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListDespesa (  ){
        require_once "class.connection.php";
        require_once "../model/class.despesa.php";
        require_once "../services/class.despesaList.php";
        $retorno = new despesaList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM despesa";
                $stmt = $this->connection->prepare( $query );



            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new despesa();
                $obj->setPgtoDesb( new pgto_desb() );
                $obj->getPgtoDesb()->setCdPgto( $row['CD_PGTO'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setDsDespesa( $row['DS_DESPESA'] );
                $retorno->addDespesa( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
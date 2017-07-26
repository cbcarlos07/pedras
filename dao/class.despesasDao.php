<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class despesasDao
{
    private $connection =  null;
  public function insert( despesas $despesas ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO despesas 
                        (CD_PGTO, NR_VALOR, DS_DESPESA) 
                        VALUES 
                        (:CD_PGTO, :NR_VALOR, :DS_DESPESA)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_PGTO", $despesas->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->bindValue( ":NR_VALOR", $despesas->getNrValor(), PDO::PARAM_STR);
            $stmt->bindValue( ":DS_DESPESA", $despesas->getDsDespesa(), PDO::PARAM_STR);
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( despesas $despesas ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE despesas SET 
                      CD_PGTO    = :CD_PGTO
                     ,NR_VALOR   = :NR_VALOR
                     ,DS_DESPESA = :DS_DESPESA 
                     WHERE CD_PGTO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_PGTO", $despesas->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->bindValue( ":NR_VALOR", $despesas->getNrValor(), PDO::PARAM_STR);
            $stmt->bindValue( ":DS_DESPESA", $despesas->getDsDespesa(), PDO::PARAM_STR);
            $stmt->bindValue( ":codigo", $despesas->getPgtoDesb()->getCdPgto(), PDO::PARAM_INT);
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $despesas ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM despesas WHERE CD_PGTO = :despesas";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":despesas", $despesas, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getDespesa ( $despesas ){
        require_once "class.connection.php";
        require_once "../model/class.despesas.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM despesas WHERE CD_PGTO = :despesas";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":despesas", $despesas, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new despesas();
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
        require_once "../model/class.despesas.php";
        require_once "../services/class.despesasList.php";
        $retorno = new despesasList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM despesas";
                $stmt = $this->connection->prepare( $query );



            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new despesas();
                $obj->setPgtoDesb( new pgto_desb() );
                $obj->getPgtoDesb()->setCdPgto( $row['CD_PGTO'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setDsDespesa( $row['DS_DESPESA'] );
                $retorno->addDespesas( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class unidadeDao
{
    private $connection =  null;
  public function insert( unidade $unidade ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO unidade 
                      (DS_UNIDADE, CATEGORIA) 
                      VALUES 
                      (:DS_UNIDADE, :CATEGORIA)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":DS_UNIDADE", $unidade->getDsUnidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":CATEGORIA", $unidade->getCategoria(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( unidade $unidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE unidade SET 
                      DS_UNIDADE = :DS_UNIDADE
                     ,CATEGORIA  = :CATEGORIA
                      WHERE CD_UNIDADE = :CD_UNIDADE";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":DS_UNIDADE", $unidade->getDsUnidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":CATEGORIA", $unidade->getCategoria(), PDO::PARAM_STR );
            $stmt->bindValue( ":CD_UNIDADE", $unidade->getCdUnidade(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $unidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM unidade WHERE CD_UNIDADE = :unidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":unidade", $unidade, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUnidade ( $unidade ){
        require_once "class.connection.php";
        require_once "../model/class.unidade.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM unidade WHERE CD_UNIDADE = :unidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":unidade", $unidade, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new unidade();
                $obj->setCdUnidade( $row['CD_UNIDADE'] );
                $obj->setDsUnidade( $row['DS_UNIDADE'] );
                $obj->setCategoria( $row['CATEGORIA'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListUf ( $unidade ){
        require_once "class.connection.php";
        require_once "../model/class.unidade.php";
        require_once "../services/class.unidadeList.php";
        $retorno = new unidadeList();
        $this->connection = new connection();

        try{
            if( $unidade == "" ){
                $query = "SELECT * FROM unidade";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM unidade WHERE DS_UNIDADE LIKE :unidade";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":unidade", "%$unidade%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new unidade();
                $obj->setCdUnidade( $row['CD_UNIDADE'] );
                $obj->setDsUnidade( $row['DS_UNIDADE'] );
                $obj->setCategoria( $row['CATEGORIA'] );
                $retorno->addUnidade( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
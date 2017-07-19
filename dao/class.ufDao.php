<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class ufDao
{
    private $connection =  null;
  public function insert( uf $uf ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO uf (NM_UF, SIGLA_UF) VALUES (:uf, :sigla)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":uf", $uf->getNmUf(), PDO::PARAM_STR );
            $stmt->bindValue( ":sigla", $uf->getSiglaUf(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( uf $uf ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE uf SET NM_UF = :uf, SIGLA_UF = :sigla WHERE CD_UF = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":uf", $uf->getNmUf(), PDO::PARAM_STR );
            $stmt->bindValue( ":sigla", $uf->getSiglaUf(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $uf->getCdUf(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $uf ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM uf WHERE CD_UF = :uf";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":uf", $uf, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUf ( $uf ){
        require_once "class.connection.php";
        require_once "../model/class.uf.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM uf WHERE CD_UF = :uf";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":uf", $uf, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new uf();
                $retorno->setCdUf( $row['CD_UF'] );
                $retorno->setNmUf( $row['NM_UF'] );
                $retorno->setSiglaUf( $row['SIGLA_UF'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListUf ( $uf ){
        require_once "class.connection.php";
        require_once "../model/class.uf.php";
        require_once "../services/class.ufList.php";
        $retorno = new ufList();
        $this->connection = new connection();

        try{
            if( $uf == "" ){
                $query = "SELECT * FROM uf";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM uf WHERE NM_UF LIKE :uf";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":uf", "%$uf%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new uf();
                $level->setCdUf( $row['CD_UF'] );
                $level->setNmUf( $row['NM_UF'] );
                $level->setSiglaUf( $row['SIGLA_UF'] );
                $retorno->addUf( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
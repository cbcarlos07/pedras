<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class cidadeDao
{
    private $connection =  null;
  public function insert( cidade $cidade ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO cidade (NM_CIDADE, CD_UF) VALUES (:cidade, :uf)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cidade", $cidade->getNmCidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":uf", $cidade->getUf()->getCdCidade(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( cidade $cidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE cidade SET NM_CIDADE = :cidade, CD_UF = :uf WHERE CD_CIDADE = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cidade", $cidade->getNmCidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":uf", $cidade->getUf()->getCdCidade(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $cidade->getCdCidade(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $cidade ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM cidade WHERE CD_UF = :cidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cidade", $cidade, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUf ( $cidade ){
        require_once "class.connection.php";
        require_once "../model/class.cidade.php";
        require_once "../model/class.uf.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM cidade WHERE CD_UF = :cidade";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":cidade", $cidade, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new cidade();
                $retorno->setCdCidade( $row['CD_UF'] );
                $retorno->setNmCidade( $row['NM_CIDADE'] );
                $retorno->setUf( new uf() );
                $retorno->getUf()->setCdUf( $row['CD_UF'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListUf ( $cidade ){
        require_once "class.connection.php";
        require_once "../model/class.cidade.php";
        require_once "../services/class.cidadeList.php";
        $retorno = new cidadeList();
        $this->connection = new connection();

        try{
            if( $cidade == "" ){
                $query = "SELECT * FROM cidade";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM cidade WHERE NM_CIDADE LIKE :cidade";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":cidade", "%$cidade%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new cidade();
                $level->setCdCidade( $row['CD_UF'] );
                $level->setNmCidade( $row['NM_CIDADE'] );
                $level->setUf( new uf() );
                $level->getUf()->setCdUf( $row['CD_UF'] );;
                $retorno->addCidade( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class eventoDao
{
    private $connection =  null;
  public function insert( evento $evento ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO evento (DS_EVENTO, PRECO_PESSOA) VALUES (:evento, :preco)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":evento", $evento->getDsEvento(), PDO::PARAM_STR );
            $stmt->bindValue( ":preco", $evento->getPrecoPessoa(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( evento $evento ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE evento SET
                      DS_EVENTO = :evento
                     ,PRECO_PESSOA = :preco
                      WHERE CD_EVENTO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":evento", $evento->getDsEvento(), PDO::PARAM_STR );
            $stmt->bindValue( ":preco", $evento->getPrecoPessoa(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $evento->getCdEvento(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $evento ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM evento WHERE CD_EVENTO = :evento";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":evento", $evento, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getEvento ( $evento ){
        require_once "class.connection.php";
        require_once "../model/class.evento.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM evento WHERE CD_EVENTO = :evento";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":evento", $evento, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new evento();
                $retorno->setCdEvento( $row['CD_EVENTO'] );
                $retorno->setDsEvento( $row['DS_EVENTO'] );
                $retorno->setPrecoPessoa( $row['PRECO_PESSOA'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListEvento ( $evento ){
        require_once "class.connection.php";
        require_once "../model/class.evento.php";
        require_once "../services/class.eventoList.php";
        $retorno = new eventoList();
        $this->connection = new connection();

        try{
            if( $evento == "" ){
                $query = "SELECT * FROM evento";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM evento WHERE DS_EVENTO LIKE :evento";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":evento", "%$evento%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new evento();
                $level = new evento();
                $level->setCdEvento( $row['CD_EVENTO'] );
                $level->setDsEvento( $row['DS_EVENTO'] );
                $level->setPrecoPessoa( $row['PRECO_PESSOA'] );
                $retorno->addEvento( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
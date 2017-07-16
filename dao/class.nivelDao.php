<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class nivelDao
{
    private $connection =  null;
  public function insert( nivel $nivel ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO nivel (DS_NIVEL) VALUES (:nivel)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nivel", $nivel->getDsNivel(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( nivel $nivel ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE nivel SET DS_NIVEL = :nivel WHERE CD_NIVEL = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nivel", $nivel->getDsNivel(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $nivel->getCdNivel(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $nivel ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM nivel WHERE CD_NIVEL = :nivel";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nivel", $nivel, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getNivel ( $nivel ){
        require_once "class.connection.php";
        require_once "../model/class.nivel.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM nivel WHERE CD_NIVEL = :nivel";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nivel", $nivel, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new nivel();
                $retorno->setCdNivel( $row['CD_NIVEL'] );
                $retorno->setDsNivel( $row['DS_NIVEL'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListNivel ( $nivel ){
        require_once "class.connection.php";
        require_once "../model/class.nivel.php";
        require_once "../services/class.nivelList.php";
        $retorno = new nivelList();
        $this->connection = new connection();

        try{
            if( $nivel == "" ){
                $query = "SELECT * FROM nivel";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM nivel WHERE DS_NIVEL LIKE :nivel";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":nivel", "%$nivel%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new nivel();
                $level->setCdNivel( $row['CD_NIVEL'] );
                $level->setDsNivel( $row['DS_NIVEL'] );
                $retorno->addNivel( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
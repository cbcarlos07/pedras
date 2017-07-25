<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class religiaoDao
{
    private $connection =  null;
  public function insert( religiao $religiao ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO religiao (NM_RELIGIAO) VALUES (:religiao)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":religiao", $religiao->getNmReligiao(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( religiao $religiao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE religiao SET NM_RELIGIAO = :religiao WHERE CD_RELIGIAO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":religiao", $religiao->getNmReligiao(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $religiao->getCdReligiao(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $religiao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM religiao WHERE CD_RELIGIAO = :religiao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":religiao", $religiao, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getReligiao ( $religiao ){
        require_once "class.connection.php";
        require_once "../model/class.religiao.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM religiao WHERE CD_RELIGIAO = :religiao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":religiao", $religiao, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new religiao();
                $retorno->setCdReligiao( $row['CD_RELIGIAO'] );
                $retorno->setNmReligiao( $row['NM_RELIGIAO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListReligiao ( $religiao ){
        require_once "class.connection.php";
        require_once "../model/class.religiao.php";
        require_once "../services/class.religiaoList.php";
        $retorno = new religiaoList();
        $this->connection = new connection();

        try{
            if( $religiao == "" ){
                $query = "SELECT * FROM religiao";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM religiao WHERE NM_RELIGIAO LIKE :religiao";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":religiao", "%$religiao%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new religiao();
                $level->setCdReligiao( $row['CD_RELIGIAO'] );
                $level->setNmReligiao( $row['NM_RELIGIAO'] );
                $retorno->addReligiao( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
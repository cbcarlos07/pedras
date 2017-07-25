<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class responsavelDao
{
    private $connection =  null;
  public function insert( responsavel $responsavel ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO responsavel (NM_RESPONSAVEL) VALUES (:responsavel)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":responsavel", $responsavel->getNmResponsavel(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( responsavel $responsavel ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE responsavel SET NM_RESPONSAVEL = :responsavel WHERE CD_RELIGIAO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":responsavel", $responsavel->getNmResponsavel(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $responsavel->getCdResponsavel(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $responsavel ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM responsavel WHERE CD_RELIGIAO = :responsavel";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":responsavel", $responsavel, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getResponsavel ( $responsavel ){
        require_once "class.connection.php";
        require_once "../model/class.responsavel.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM responsavel WHERE CD_RELIGIAO = :responsavel";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":responsavel", $responsavel, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new responsavel();
                $retorno->setCdResponsavel( $row['CD_RELIGIAO'] );
                $retorno->setNmResponsavel( $row['NM_RESPONSAVEL'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListResponsavel ( $responsavel ){
        require_once "class.connection.php";
        require_once "../model/class.responsavel.php";
        require_once "../services/class.responsavelList.php";
        $retorno = new responsavelList();
        $this->connection = new connection();

        try{
            if( $responsavel == "" ){
                $query = "SELECT * FROM responsavel";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM responsavel WHERE NM_RESPONSAVEL LIKE :responsavel";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":responsavel", "%$responsavel%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new responsavel();
                $level->setCdResponsavel( $row['CD_RELIGIAO'] );
                $level->setNmResponsavel( $row['NM_RESPONSAVEL'] );
                $retorno->addResponsavel( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
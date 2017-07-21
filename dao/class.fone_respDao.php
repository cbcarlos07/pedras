<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class fone_respDao
{
    private $connection =  null;
  public function insert( fone_resp $fone_resp ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO fone_resp (CD_RESPONSAVEL, NR_FONE, FONE_OBS) 
                                     VALUES (:resp, :fone, :obs)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":resp", $fone_resp->getResponsavel()->getCdResponsavel(), PDO::PARAM_INT );
            $stmt->bindValue( ":fone", $fone_resp->getNrFone(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $fone_resp->getFoneObs(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( fone_resp $fone_resp ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE fone_resp SET
                      CD_RESPONSAVEL = :desb
                     ,NR_FONE = :fone
                     ,FONE_OBS = :obs
                      WHERE CD_FONE = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":resp", $fone_resp->getResponsavel()->getCdResponsavel(), PDO::PARAM_INT );
            $stmt->bindValue( ":fone", $fone_resp->getNrFone(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $fone_resp->getFoneObs(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $fone_resp->getCdFone(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $fone_resp ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM fone_resp WHERE CD_FONE = :fone_resp";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":fone_resp", $fone_resp, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getFone ( $fone_resp ){
        require_once "class.connection.php";
        require_once "../model/class.fone_resp.php";
        require_once "../model/class.responsavel.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM fone_resp WHERE CD_FONE = :fone_resp";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":fone_resp", $fone_resp, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new fone_resp();
                $obj->setCdFone( $row['CD_FONE'] );
                $obj->setResponsavel( new responsavel() );
                $obj->getResponsavel()->setCdResponsavel( $row['CD_RESPONSAVEL'] );
                $obj->setNrFone( $row['NR_FONE'] );
                $obj->setFoneObs( $row['FONE_OBS'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListFone ( ){
        require_once "class.connection.php";
        require_once "../model/class.fone_resp.php";
        require_once "../services/class.fone_respList.php";
        require_once "../model/class.desbravador.php";
        $retorno = new fone_respList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM fone_resp ";
                $stmt = $this->connection->prepare( $query );



            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new fone_resp();
                $obj->setCdFone( $row['CD_FONE'] );
                $obj->setResponsavel( new responsavel() );
                $obj->getResponsavel()->setCdResponsavel( $row['CD_RESPONSAVEL'] );
                $obj->setNrFone( $row['NR_FONE'] );
                $obj->setFoneObs( $row['FONE_OBS'] );
                $retorno->addFone_resp( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
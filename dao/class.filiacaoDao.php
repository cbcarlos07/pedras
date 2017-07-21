<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class filiacaoDao
{
    private $connection =  null;
  public function insert( filiacao $filiacao ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO filiacao (CD_DESB, CD_RESPONSAVEL) 
                                    VALUES (:desbrav, :responsavel)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbrav", $filiacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":responsavel", $filiacao->getResponsavel()->getCdResponsavel(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( filiacao $filiacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE filiacao SET 
                      CD_DESB = :desb
                      ,CD_RESPONSAVEL = :responsavel 
                      WHERE CD_FILIACAO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbrav", $filiacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":responsavel", $filiacao->getResponsavel()->getCdResponsavel(), PDO::PARAM_INT );
            $stmt->bindValue( ":codigo", $filiacao->getCdFiliacao(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $filiacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM filiacao WHERE CD_FILIACAO = :filiacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":filiacao", $filiacao, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getFiliacao ( $filiacao ){
        require_once "class.connection.php";
        require_once "../model/class.filiacao.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.responsavel.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM filiacao WHERE CD_FILIACAO = :filiacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":filiacao", $filiacao, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new filiacao();
                $obj->setCdFiliacao( $row['CD_FILIACAO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setResponsavel( new responsavel() );
                $obj->getResponsavel()->setCResponsavel( $row['CD_RESPONSAVEL'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListFiliacao ( ){
        require_once "class.connection.php";
        require_once "../model/class.filiacao.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.responsavel.php";
        require_once "../services/class.filiacaoList.php";
        $retorno = new filiacaoList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM filiacao";
                $stmt = $this->connection->prepare( $query );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new filiacao();
                $obj->setCdFiliacao( $row['CD_FILIACAO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setResponsavel( new responsavel() );
                $obj->getResponsavel()->setCResponsavel( $row['CD_RESPONSAVEL'] );
                $retorno->addFiliacao( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
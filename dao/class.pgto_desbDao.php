<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class pgto_desbDao
{
    private $connection =  null;
  public function insert( pgto_desb $pgto_desb ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO pgto_desb 
                          (CD_DESB, CD_EVENTO) 
                          VALUES
                          (:CD_DESB, :CD_EVENTO)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $pgto_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":CD_EVENTO", $pgto_desb->getEvento()->getCdEvento(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( pgto_desb $pgto_desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE pgto_desb SET 
                        CD_DESB    = :CD_DESB
                       ,CD_EVENTO  = :CD_EVENTO
                       WHERE CD_DESB = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $pgto_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":CD_EVENTO", $pgto_desb->getEvento()->getCdEvento(), PDO::PARAM_INT );
            $stmt->bindValue( ":codigo", $pgto_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $pgto_desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM pgto_desb WHERE CD_DESB = :pgto_desb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":pgto_desb", $pgto_desb, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getNivel ( $pgto_desb ){
        require_once "class.connection.php";
        require_once "../model/class.pgto_desb.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM pgto_desb WHERE CD_DESB = :pgto_desb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":pgto_desb", $pgto_desb, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new pgto_desb();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row[ 'CD_DESB' ] );
                $obj->setEvento( new evento() );
                $obj->getEvento()->setCdEvento( $row['CD_EVENTO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListNivel (  ){
        require_once "class.connection.php";
        require_once "../model/class.pgto_desb.php";
        require_once "../services/class.pgto_desbList.php";
        $retorno = new pgto_desbList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM pgto_desb";
                $stmt = $this->connection->prepare( $query );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new pgto_desb();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row[ 'CD_DESB' ] );
                $obj->setEvento( new evento() );
                $obj->getEvento()->setCdEvento( $row['CD_EVENTO'] );
                $retorno->addPgto_desb( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
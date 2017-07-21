<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class fone_desbDao
{
    private $connection =  null;
  public function insert( fone_desb $fone_desb ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO fone_desb (CD_DESB, NR_FONE, OBS_FONE) 
                                     VALUES (:desbr, :fone, :obs)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbr", $fone_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":fone", $fone_desb->getNrFone(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $fone_desb->getObsFone(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( fone_desb $fone_desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE fone_desb SET
                      CD_DESB = :desb
                     ,NR_FONE = :fone
                     ,OBS_FONE = :obs
                      WHERE CD_FONE = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbr", $fone_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":fone", $fone_desb->getNrFone(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $fone_desb->getObsFone(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $fone_desb->getCdFone(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $fone_desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM fone_desb WHERE CD_FONE = :fone_desb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":fone_desb", $fone_desb, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getFone ( $fone_desb ){
        require_once "class.connection.php";
        require_once "../model/class.fone_desb.php";
        require_once "../model/class.desbravador.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM fone_desb WHERE CD_FONE = :fone_desb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":fone_desb", $fone_desb, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new fone_desb();
                $obj->setCdFone( $row['CD_FONE'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setNrFone( $row['NR_FONE'] );
                $obj->setObsFone( $row['OBS_FONE'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListFone ( ){
        require_once "class.connection.php";
        require_once "../model/class.fone_desb.php";
        require_once "../services/class.fone_desbList.php";
        require_once "../model/class.desbravador.php";
        $retorno = new fone_desbList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM fone_desb ";
                $stmt = $this->connection->prepare( $query );



            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new fone_desb();
                $obj->setCdFone( $row['CD_FONE'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setNrFone( $row['NR_FONE'] );
                $obj->setObsFone( $row['OBS_FONE'] );
                $retorno->addFone_desb( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
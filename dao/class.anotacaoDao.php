<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class anotacaoDao
{
    private $connection =  null;
  public function insert( anotacao $anotacao ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO anotacao
                          (CD_DESB, NR_VALOR, OBS_ANOTACAO) 
                          VALUES 
                          (:desbravador, :valor, :observacao)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $anotacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":valor", $anotacao->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $anotacao->getObsAnotacao(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( anotacao $anotacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE anotacao SET 
                       CD_DESB = :desbravador
                      ,NR_VALOR = :valor
                      ,OBS_ANOTACAO = :observacao
                       WHERE CD_ANOTACAO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $anotacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":valor", $anotacao->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $anotacao->getObsAnotacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $anotacao->getCdAnotacao(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $anotacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM anotacao WHERE CD_ANOTACAO = :anotacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":anotacao", $anotacao, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getAnotacao ( $anotacao ){
        require_once "class.connection.php";
        require_once "../model/class.anotacao.php";
        require_once "../model/class.desbravador.php";

        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM anotacao WHERE CD_ANOTACAO = :anotacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":anotacao", $anotacao, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new anotacao();
                $obj->setCdAnotacao( $row['CD_ANOTACAO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setDesb( $row['CD_DESB'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setObsAnotacao( $row['OBS_ANOTACAO'] );


            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListAnotacao ( $anotacao ){
        require_once "class.connection.php";
        require_once "../model/class.anotacao.php";
        require_once "../services/class.anotacaoList.php";
        $retorno = new anotacaoList();
        $this->connection = new connection();

        try{
            if( $anotacao == "" ){
                $query = "SELECT * FROM anotacao";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM anotacao WHERE OBS_ANOTACAO LIKE :anotacao";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":anotacao", "%$anotacao%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new anotacao();
                $obj->setCdAnotacao( $row['CD_ANOTACAO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setDesb( $row['CD_DESB'] );
                $obj->setNrValor( $row['NR_VALOR'] );
                $obj->setObsAnotacao( $row['OBS_ANOTACAO'] );
                $retorno->addAnotacao( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
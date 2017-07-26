<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class pagamentoDao
{
    private $connection =  null;
  public function insert( pagamento $pagamento ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO pagamento 
                          (CD_DESB, CD_EVENTO, NR_VALOR, DT_PGTO) 
                          VALUES
                          (:CD_DESB, :CD_EVENTO, :NR_VALOR, :DT_PGTO)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $pagamento->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":CD_EVENTO", $pagamento->getEvento()->getCdEvento(), PDO::PARAM_INT );
            $stmt->bindValue( ":NR_VALOR", $pagamento->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":DT_PGTO", $pagamento->getDtPgto(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( pagamento $pagamento ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE pagamento SET 
                        CD_DESB    = :CD_DESB
                       ,CD_EVENTO  = :CD_EVENTO
                       ,NR_VALOR   = :NR_VALOR
                       ,DT_PGTO    = :DT_PGTO
                       WHERE CD_DESB = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $pagamento->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":CD_EVENTO", $pagamento->getEvento()->getCdEvento(), PDO::PARAM_INT );
            $stmt->bindValue( ":NR_VALOR", $pagamento->getNrValor(), PDO::PARAM_STR );
            $stmt->bindValue( ":DT_PGTO", $pagamento->getDtPgto(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $pagamento->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $pagamento ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM pagamento WHERE CD_DESB = :pagamento";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":pagamento", $pagamento, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getNivel ( $pagamento ){
        require_once "class.connection.php";
        require_once "../model/class.pagamento.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM pagamento WHERE CD_DESB = :pagamento";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":pagamento", $pagamento, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new pagamento();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row[ 'CD_DESB' ] );
                $obj->setEvento( new evento() );
                $obj->getEvento()->setCdEvento( $row['CD_EVENTO'] );
                $obj->setNrValor( $row[ 'NR_VALOR' ] );
                $obj->setDtPgto( $row['DT_PGTO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListNivel (  ){
        require_once "class.connection.php";
        require_once "../model/class.pagamento.php";
        require_once "../services/class.pagamentoList.php";
        $retorno = new pagamentoList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM pagamento";
                $stmt = $this->connection->prepare( $query );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new pagamento();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row[ 'CD_DESB' ] );
                $obj->setEvento( new evento() );
                $obj->getEvento()->setCdEvento( $row['CD_EVENTO'] );
                $obj->setNrValor( $row[ 'NR_VALOR' ] );
                $obj->setDtPgto( $row['DT_PGTO'] );
                $retorno->addPagamento( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
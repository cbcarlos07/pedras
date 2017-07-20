<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class desbravadorDao
{
    private $connection =  null;
  public function insert( desbravador $desbravador ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO desbravador 
                      (NM_DESBRAVADOR, DS_SEXO, DT_NASC, CD_CIDADE, SN_BATIZADO, CD_RELIGIAO, SN_RECEBEU_LENCO, 
                      DT_RECEBEU_LENCO, DS_FOTO, NR_CEP, DS_EMAIL, SN_ATIVO)
                       VALUES
                      (:nome, :sexo, :nascimento, :cidade, :batizado, :religiao, :lenco, 
                       :dtlenco, :foto, :cep, :email, :ativo)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nome", $desbravador->getNmDesbravador(), PDO::PARAM_STR );
            $stmt->bindValue( ":sexo", $desbravador->getDsSexo(), PDO::PARAM_STR );
            $stmt->bindValue( ":nascimento", $desbravador->getDtNascimento(), PDO::PARAM_STR );
            $stmt->bindValue( ":cidade", $desbravador->getCidade()->getCdCidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":batizado", $desbravador->getSnBatizado(), PDO::PARAM_STR );
            $stmt->bindValue( ":religiao", $desbravador->getReligiao()->getCdReligiao(), PDO::PARAM_INT );
            $stmt->bindValue( ":lenco", $desbravador->getSnRecebeuLenco(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtlenco", $desbravador->getDtRecebeuLenco(), PDO::PARAM_STR );
            $stmt->bindValue( ":foto", $desbravador->getDsFoto(), PDO::PARAM_STR );
            $stmt->bindValue( ":cep", $desbravador->getNrCep(), PDO::PARAM_STR );
            $stmt->bindValue( ":email", $desbravador->getDsEmail(), PDO::PARAM_STR );
            $stmt->bindValue( ":ativo", $desbravador->getSnAtivo(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( desbravador $desbravador ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE desbravador SET 
                       NM_DESBRAVADOR = :nome 
                      ,DS_SEXO        = :sexo
                      ,DT_NASC        = :nascimento
                      ,CD_CIDADE      = :cidade
                      ,SN_BATIZADO    = :batizado
                      ,CD_RELIGIAO    = :religiao
                      ,SN_RECEBEU_LENCO = :lenco
                      ,DT_RECEBEU_LENCO = :dtlenco
                      ,DS_FOTO        = :foto
                      ,NR_CEP         = :cep
                      ,DS_EMAIL       = :email
                      ,SN_ATIVO       = :ativo 
                      WHERE CD_DESB   = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":nome", $desbravador->getNmDesbravador(), PDO::PARAM_STR );
            $stmt->bindValue( ":sexo", $desbravador->getDsSexo(), PDO::PARAM_STR );
            $stmt->bindValue( ":nascimento", $desbravador->getDtNascimento(), PDO::PARAM_STR );
            $stmt->bindValue( ":cidade", $desbravador->getCidade()->getCdCidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":batizado", $desbravador->getSnBatizado(), PDO::PARAM_STR );
            $stmt->bindValue( ":religiao", $desbravador->getReligiao()->getCdReligiao(), PDO::PARAM_INT );
            $stmt->bindValue( ":lenco", $desbravador->getSnRecebeuLenco(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtlenco", $desbravador->getDtRecebeuLenco(), PDO::PARAM_STR );
            $stmt->bindValue( ":foto", $desbravador->getDsFoto(), PDO::PARAM_STR );
            $stmt->bindValue( ":cep", $desbravador->getNrCep(), PDO::PARAM_STR );
            $stmt->bindValue( ":email", $desbravador->getDsEmail(), PDO::PARAM_STR );
            $stmt->bindValue( ":ativo", $desbravador->getSnAtivo(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $desbravador->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $desbravador ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM desbravador WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $desbravador, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getDesbravador ( $desbravador ){
        require_once "class.connection.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.cidade.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT D.*
                            ,DATE_FORMAT(D.DT_NASC, '%d/%m/%Y') NASC
                            ,DATE_FORMAT(D.DT_RECEBEU_LENCO, '%d/%m/%Y') DT_LENCO
                        FROM desbravador D 
                       WHERE D.CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $desbravador, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new desbravador();
                $retorno->setCdDesb( $row['CD_DESB'] );
                $retorno->setNmDesbravador( $row['NM_DESBRAVADOR'] );
                $retorno->setDsSexo( $row['DS_SEXO'] );
                $retorno->setDtNascimento( $row['NASC'] );
                $retorno->setCidade( new cidade() );
                $retorno->getCidade()->setCdCidade( $row['CD_CIDADE'] );
                $retorno->setSnBatizado( $row['SN_BATIZADO'] );
                $retorno->setReligiao( new religiao() );
                $retorno->getReligiao()->getCdReligiao( $row['CD_RELIGIAO'] );
                $retorno->setSnRecebeuLenco( $row['SN_RECEBEU_LENCO'] );
                $retorno->setDtRecebeuLenco( $row['DT_LENCO'] );
                $retorno->setDsFoto( $row['DS_FOTO'] );
                $retorno->setNrCep( $row['NR_CEP'] );
                $retorno->setDsEmail( $row['DS_EMAIL'] );
                $retorno->setSnAtivo( $row['SN_ATIVO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListDesbravador ( $desbravador ){
        require_once "class.connection.php";
        require_once "../model/class.desbravador.php";
        require_once "../services/class.desbravadorList.php";
        $lista = new desbravadorList();
        $this->connection = new connection();

        try{

                $query = "SELECT D.* 
                                ,R.NM_RELIGIAO
                            FROM desbravador D
                            JOIN religiao R
                            JOIN cidade   C
                           WHERE D.NM_DESBRAVADOR LIKE :desbravador
                             AND R.CD_RELIGIAO = D.CD_RELIGIAO
                             AND C.CD_CIDADE = D.CD_CIDADE";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":desbravador", "%$desbravador%", PDO::PARAM_STR );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno= new desbravador();
                $retorno->setCdDesb( $row['CD_DESB'] );
                $retorno->setNmDesbravador( $row['NM_DESBRAVADOR'] );
                $retorno->setDsSexo( $row['DS_SEXO'] );
                $retorno->setDtNascimento( $row['NASC'] );
                $retorno->setCidade( new cidade() );
                $retorno->getCidade()->setCdCidade( $row['CD_CIDADE'] );
                $retorno->getCidade()->setNmCidade( $row['NM_CIDADE'] );
                $retorno->setSnBatizado( $row['SN_BATIZADO'] );
                $retorno->setReligiao( new religiao() );
                $retorno->getReligiao()->getCdReligiao( $row['CD_RELIGIAO'] );
                $retorno->getReligiao()->getNmReligiao( $row['NM_RELIGIAO'] );
                $retorno->setSnRecebeuLenco( $row['SN_RECEBEU_LENCO'] );
                $retorno->setDtRecebeuLenco( $row['DT_LENCO'] );
                $retorno->setDsFoto( $row['DS_FOTO'] );
                $retorno->setNrCep( $row['NR_CEP'] );
                $retorno->setDsEmail( $row['DS_EMAIL'] );
                $retorno->setSnAtivo( $row['SN_ATIVO'] );
                $lista->addDesbravador( $retorno );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $lista;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class espec_desbDao
{
    private $connection =  null;
  public function insert( espec_desb $espec_desb ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO espec_desb 
                      (CD_ESPECIALIDADE, IMG_CERTIFICADO, CD_DESB) 
                      VALUES 
                      (:espec, :certificado, :desbravador)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":espec", $espec_desb->getEspecialidade()->getCdEspecialidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":certificado", $espec_desb->getImgCertificado(), PDO::PARAM_STR );
            $stmt->bindValue( ":desbravador", $espec_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( espec_desb $espec_desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE espec_desb SET 
                        CD_ESPECIALIDADE = :espec 
                       ,IMG_CERTIFICADO  = :certificado
                       WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":espec", $espec_desb->getEspecialidade()->getCdEspecialidade(), PDO::PARAM_INT );
            $stmt->bindValue( ":certificado", $espec_desb->getImgCertificado(), PDO::PARAM_STR );
            $stmt->bindValue( ":desbravador", $espec_desb->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $espec, $desb ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM espec_desb WHERE CD_DESB = :desb AND CD_ESPECIALIDADE = :espec";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb", $desb, PDO::PARAM_INT );
            $stmt->bindValue( ":espec", $espec, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getEspecialidade ( $espec, $desb ){
        require_once "class.connection.php";
        require_once "../model/class.espec_desb.php";
        require_once "../model/class.especialidade.php";
        require_once "../model/class.desbravador.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT ED.*
                        FROM espec_desb  ED
                        JOIN desbravador D ON ED.CD_DESB = D.CD_DESB
                        JOIN especialidade E ON ED.CD_ESPECIALIDADE = E.CD_ESPECIALIDADE
                        WHERE ED.CD_DESB = :desb 
                          AND ED.CD_ESPECIALIDADE = :espec";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb", $desb, PDO::PARAM_INT );
            $stmt->bindValue( ":espec", $espec, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new espec_desb();
                $retorno->setEspecialidade( new especialidade() );
                $retorno->getEspecialidade()->setCdEspecialidade( $row['CD_ESPECIALIDADE'] );
                $retorno->setDesbravador( new desbravador() );
                $retorno->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $retorno->setImgCertificado( $row['IMG_CERTIFICADO'] );
            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListEspecialidades ( $espec ){
        require_once "class.connection.php";
        require_once "../model/class.espec_desb.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.especialidade.php";
        require_once "../services/class.espec_desbList.php";
        $lista = new espec_desbList();
        $this->connection = new connection();

        try{
                $query = "SELECT ED.*
                                ,E.DS_ESPECIALIDADE
                                ,D.NM_DESBRAVADOR
                        FROM espec_desb  ED
                        JOIN desbravador D ON ED.CD_DESB = D.CD_DESB
                        JOIN especialidade E ON ED.CD_ESPECIALIDADE = E.CD_ESPECIALIDADE
                        WHERE ED.CD_DESB = :desb 
                          AND E.DS_ESPECIALIDADE LIKE :espec";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":espec_desb", "%$espec%", PDO::PARAM_STR );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new espec_desb();
                $retorno->setEspecialidade( new especialidade() );
                $retorno->getEspecialidade()->setCdEspecialidade( $row['CD_ESPECIALIDADE'] );
                $retorno->getEspecialidade()->setDsEspecialidade( $row['DS_ESPECIALIDADE'] );
                $retorno->setDesbravador( new desbravador() );
                $retorno->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $retorno->setImgCertificado( $row['IMG_CERTIFICADO'] );
                $lista->addEspec_desb( $retorno );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $lista;
    }
}
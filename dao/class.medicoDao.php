<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class medicoDao
{
    private $connection =  null;
  public function insert( medico $medico ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO medico
                          (CD_DESB, TIPO_SANGUINEO, FATOR_RH, SN_VAC_CONT_TET, DT_VAC_CONT_TET, DS_DOENCA, DS_ALERGIA, ACIDENTE_AVISAR) 
                          VALUES 
                          (:CD_DESB, :TIPO_SANGUINEO, :FATOR_RH, :SN_VAC_CONT_TET, :DT_VAC_CONT_TET, :DS_DOENCA, :DS_ALERGIA, :ACIDENTE_AVISAR)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $medico->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":TIPO_SANGUINEO", $medico->getTipoSanguineo(), PDO::PARAM_STR );
            $stmt->bindValue( ":FATOR_RH", $medico->getFatorRH(), PDO::PARAM_STR );
            $stmt->bindValue( ":SN_VAC_CONT_TET", $medico->getSnVacContTet(), PDO::PARAM_STR );
            $stmt->bindValue( ":DT_VAC_CONT_TET", $medico->getDtVacContTet(), PDO::PARAM_STR );
            $stmt->bindValue( ":DS_DOENCA", $medico->getDsDoenca(), PDO::PARAM_STR );
            $stmt->bindValue( ":DS_ALERGIA", $medico->getDsAlergia(), PDO::PARAM_STR );
            $stmt->bindValue( ":ACIDENTE_AVISAR", $medico->getAcidenteAvisar(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( medico $medico ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE medico SET 
                        TIPO_SANGUINEO    = :TIPO_SANGUINEO
                       ,FATOR_RH          = :FATOR_RH  
                       ,SN_VAC_CONT_TET   = :SN_VAC_CONT_TET
                       ,DT_VAC_CONT_TET   = :DT_VAC_CONT_TET
                       ,DS_DOENCA         = :DS_DOENCA
                       ,DS_ALERGIA        = :DS_ALERGIA
                       ,ACIDENTE_AVISAR   = :ACIDENTE_AVISAR
                       WHERE CD_DESB = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":CD_DESB", $medico->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":TIPO_SANGUINEO", $medico->getTipoSanguineo(), PDO::PARAM_STR );
            $stmt->bindValue( ":FATOR_RH", $medico->getFatorRH(), PDO::PARAM_STR );
            $stmt->bindValue( ":SN_VAC_CONT_TET", $medico->getSnVacContTet(), PDO::PARAM_STR );
            $stmt->bindValue( ":DT_VAC_CONT_TET", $medico->getDtVacContTet(), PDO::PARAM_STR );
            $stmt->bindValue( ":DS_DOENCA", $medico->getDsDoenca(), PDO::PARAM_STR );
            $stmt->bindValue( ":DS_ALERGIA", $medico->getDsAlergia(), PDO::PARAM_STR );
            $stmt->bindValue( ":ACIDENTE_AVISAR", $medico->getAcidenteAvisar(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $medico ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM medico WHERE CD_DESB = :medico";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":medico", $medico, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getMedico ( $medico ){
        require_once "class.connection.php";
        require_once "../model/class.medico.php";
        require_once "../model/class.desbravador.php";

        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM medico WHERE CD_DESB = :medico";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":medico", $medico, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new medico();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setTipoSanguineo( $row['TIPO_SANGUINEO'] );
                $obj->setFatorRH( $row['FATOR_RH'] );
                $obj->setSnVacContTet( $row['SN_VAC_CONT_TET'] );
                $obj->setDtVacContTet( $row['DT_VAC_CONT_TET'] );
                $obj->setDsDoenca( $row['DS_DOENCA'] );
                $obj->setDsAlergia( $row['DS_ALERGIA'] );
                $obj->setAcidenteAvisar( $row['ACIDENTE_AVISAR'] );



            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListMedico ( $medico ){
        require_once "class.connection.php";
        require_once "../model/class.medico.php";
        require_once "../services/class.medicoList.php";
        $retorno = new medicoList();
        $this->connection = new connection();

        try{
            if( $medico == "" ){
                $query = "SELECT M.*
                                ,D.NM_DESBRAVADOR      
                          FROM medico M
                          INNER JOIN desbravador D ON M.CD_DESB = D.CD_DESB";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT M.*
                                ,D.NM_DESBRAVADOR
                          FROM medico M
                           INNER JOIN desbravador D ON D.CD_DESB = M.CD_DESB
                          WHERE  D.NM_DESBRAVADOR LIKE :medico
                          LIKE :medico";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":medico", "%$medico%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new medico();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setTipoSanguineo( $row['TIPO_SANGUINEO'] );
                $obj->setFatorRH( $row['FATOR_RH'] );
                $obj->setSnVacContTet( $row['SN_VAC_CONT_TET'] );
                $obj->setDtVacContTet( $row['DT_VAC_CONT_TET'] );
                $obj->setDsDoenca( $row['DS_DOENCA'] );
                $obj->setDsAlergia( $row['DS_ALERGIA'] );
                $obj->setAcidenteAvisar( $row['ACIDENTE_AVISAR'] );
                $retorno->addMedico( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
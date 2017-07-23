<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class desb_projetoDao
{
    private $connection =  null;
  public function insert( desb_projeto $desb_projeto ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO desb_projeto
                          (CD_PROJETO, CD_DESB, OBS_PROJETO) 
                          VALUES 
                          (:projeto, :desbravador, :obs)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $desb_projeto->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":projeto", $desb_projeto->getProjeto()->getCdProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $desb_projeto->getObsProjeto(), PDO::PARAM_STR );
           
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( desb_projeto $desb_projeto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE desb_projeto SET 
                       CD_PROJETO = :projeto
                      ,CD_DESB = :desbravador
                      ,OBS_PROJETO = :obs
                       WHERE CD_DESB_PROJETO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $desb_projeto->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":projeto", $desb_projeto->getProjeto()->getCdProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":obs", $desb_projeto->getObsProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $desb_projeto->getCdDesbProjeto(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $desb_projeto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM desb_projeto WHERE CD_DESB_PROJETO = :desb_projeto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_projeto", $desb_projeto, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getProjeto ( $desb_projeto ){
        require_once "class.connection.php";
        require_once "../model/class.desb_projeto.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.projeto.php";

        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM desb_projeto WHERE CD_PROJETO = :desb_projeto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb_projeto", $desb_projeto, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new desb_projeto();
                $obj->setCdDesbProjeto( $row['CD_DESB_PROJETO'] );
                $obj->setProjeto( new projeto() );
                $obj->getProjeto()->setCdProjeto( $row['CD_PROJETO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setObsProjeto( $row['OBS_PROJETO'] );



            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListProjeto ( $desb_projeto ){
        require_once "class.connection.php";
        require_once "../model/class.desb_projeto.php";
        require_once "../services/class.desb_projetoList.php";
        $retorno = new desb_projetoList();
        $this->connection = new connection();

        try{
            if( $desb_projeto == "" ){
                $query = "SELECT DB.*
                                ,D.NM_DESBRAVADOR
                                ,P.DS_PROJETO
                            FROM desb_projeto DB
                            INNER JOIN desbravador D ON DB.CD_DESB = D.CD_DESB
                            INNER JOIN projeto P ON DB.CD_PROJETO = P.CD_PROJETO";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT DB.*
                                ,D.NM_DESBRAVADOR
                                ,P.DS_PROJETO
                            FROM desb_projeto DB
                            INNER JOIN desbravador D ON DB.CD_DESB = D.CD_DESB
                            INNER JOIN projeto P ON DB.CD_PROJETO = P.CD_PROJETO
                            WHERE P.DS_PROJETO LIKE :projeto";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":projeto", "%$desb_projeto%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new desb_projeto();
                $obj->setCdDesbProjeto( $row['CD_DESB_PROJETO'] );
                $obj->setProjeto( new projeto() );
                $obj->getProjeto()->setCdProjeto( $row['CD_PROJETO'] );
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setObsProjeto( $row['OBS_PROJETO'] );
                $retorno->addDesb_projeto( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
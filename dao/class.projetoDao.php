<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class projetoDao
{
    private $connection =  null;
  public function insert( projeto $projeto ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO projeto 
                      (DS_PROJETO, OBS_PROJETO) 
                      VALUES (:projeto, :observacao)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":projeto", $projeto->getDsProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $projeto->getObsProjeto(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( projeto $projeto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE projeto SET 
                      DS_PROJETO = :projeto
                     ,OBS_PROJETO = :observacao 
                      WHERE CD_PROJETO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":projeto", $projeto->getDsProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $projeto->getObsProjeto(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $projeto->getCdProjeto(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $projeto ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM projeto WHERE CD_PROJETO = :projeto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":projeto", $projeto, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getProjeto ( $projeto ){
        require_once "class.connection.php";
        require_once "../model/class.projeto.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM projeto WHERE CD_PROJETO = :projeto";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":projeto", $projeto, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new projeto();
                $obj->setCdProjeto( $row['CD_PROJETO'] );
                $obj->setDsProjeto( $row['DS_PROJETO'] );
                $obj->setObsProjeto( $row['OBS_PROJETO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListProjeto ( $projeto ){
        require_once "class.connection.php";
        require_once "../model/class.projeto.php";
        require_once "../services/class.projetoList.php";
        $retorno = new projetoList();
        $this->connection = new connection();

        try{
            if( $projeto == "" ){
                $query = "SELECT * FROM projeto";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT * FROM projeto WHERE DS_PROJETO LIKE :projeto";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":projeto", "%$projeto%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new projeto();
                $obj->setCdProjeto( $row['CD_PROJETO'] );
                $obj->setDsProjeto( $row['DS_PROJETO'] );
                $obj->setObsProjeto( $row['OBS_PROJETO'] );
                $retorno->addProjeto( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
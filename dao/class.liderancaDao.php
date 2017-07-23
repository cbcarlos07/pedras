<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class liderancaDao
{
    private $connection =  null;
  public function insert( lideranca $lideranca ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO lideranca 
                      (CD_DESB, CD_CURSO, DT_INVESTIDURA, IMG_CERTIFICADO) 
                      VALUES 
                      (:desbravador, :curso, :dtinvetidura, :imagem)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $lideranca->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":curso", $lideranca->getCurso()->getCdCurso(), PDO::PARAM_INT );
            $stmt->bindValue( ":dtinvetidura", $lideranca->getDtInvestidura(), PDO::PARAM_STR );
            $stmt->bindValue( ":imagem", $lideranca->getImgCertificado(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( lideranca $lideranca ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE lideranca SET 
                      CD_DESB   = :desbravador
                     ,CD_CURSO = :curso 
                     ,IMG_CERTIFICADO = :imagem
                     ,DT_INVESTIDURA = :dtinvestidura
                     WHERE CD_DESB = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $lideranca->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":curso", $lideranca->getCurso()->getCdCurso(), PDO::PARAM_INT );
            $stmt->bindValue( ":dtinvestidura", $lideranca->getDtInvestidura(), PDO::PARAM_STR );
            $stmt->bindValue( ":imagem", $lideranca->getImgCertificado(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $lideranca->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $lideranca ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM lideranca WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $lideranca, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getCurso ( $lideranca ){
        require_once "class.connection.php";
        require_once "../model/class.lideranca.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.curso.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM lideranca WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $lideranca, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new lideranca();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setCurso( new curso() );
                $obj->getCurso()->setCdClasse( $row['CD_CURSO'] );
                $obj->setDtInvestidura( $row['DT_INVESTIDURA'] );
                $obj->setImgCertificado( $row['IMG_CERTIFICADO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListCurso (  ){
        require_once "class.connection.php";
        require_once "../model/class.lideranca.php";
        require_once "../model/class.curso.php";
        require_once "../model/class.desbravador.php";
        require_once "../services/class.cursoList.php";
        $retorno = new liderancaList();
        $this->connection = new connection();

        try{

                $query = "SELECT I.* 
                            FROM lideranca I
                            INNER JOIN curso C ON I.CD_CURSO = C.CD_CURSO";
                $stmt = $this->connection->prepare( $query );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new lideranca();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setCurso( new curso() );
                $obj->getCurso()->setCdClasse( $row['CD_CURSO'] );
                $obj->setDtInvestidura( $row['DT_INVESTIDURA'] );
                $obj->setImgCertificado( $row['IMG_CERTIFICADO'] );
                $retorno->addLideranca( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
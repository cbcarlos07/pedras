<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class investiduraDao
{
    private $connection =  null;
  public function insert( investidura $investidura ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO investidura 
                      (CD_DESB, CD_CLASSE, DT_INVESTIDURA, IMG_CERTIFICADO) 
                      VALUES 
                      (:desbravador, :classe, :dtinvetidura, :imagem)";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $investidura->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":classe", $investidura->getClasse()->getCdClasse(), PDO::PARAM_INT );
            $stmt->bindValue( ":dtinvestidura", $investidura->getDtInvestidura(), PDO::PARAM_STR );
            $stmt->bindValue( ":imagem", $investidura->getImgCertificado(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( investidura $investidura ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE investidura SET 
                      CD_DESB   = :desbravador
                     ,CD_CLASSE = :classe 
                     ,IMG_CERTIFICADO = :imagem
                     WHERE CD_DESB = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $investidura->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->bindValue( ":classe", $investidura->getClasse()->getCdClasse(), PDO::PARAM_INT );
            $stmt->bindValue( ":dtinvestidura", $investidura->getDtInvestidura(), PDO::PARAM_STR );
            $stmt->bindValue( ":imagem", $investidura->getImgCertificado(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $investidura->getDesbravador()->getCdDesb(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $investidura ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM investidura WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $investidura, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getInvestidura ( $investidura ){
        require_once "class.connection.php";
        require_once "../model/class.investidura.php";
        require_once "../model/class.desbravador.php";
        require_once "../model/class.classes.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM investidura WHERE CD_DESB = :desbravador";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desbravador", $investidura, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new investidura();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setClasse( new classes() );
                $obj->getClasse()->setCdClasse( $row['CD_CLASSE'] );
                $obj->setDtInvestidura( $row['DT_INVESTIDURA'] );
                $obj->setImgCertificado( $row['IMG_CERTIFICADO'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListInvestidura (  ){
        require_once "class.connection.php";
        require_once "../model/class.investidura.php";
        require_once "../model/class.classes.php";
        require_once "../model/class.desbravador.php";
        require_once "../services/class.investiduraList.php";
        $retorno = new investiduraList();
        $this->connection = new connection();

        try{

                $query = "SELECT I.* 
                            FROM investidura I
                            INNER JOIN classes C ON I.CD_CLASSE = C.CD_CLASSE";
                $stmt = $this->connection->prepare( $query );


            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new investidura();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setClasse( new classes() );
                $obj->getClasse()->setCdClasse( $row['CD_CLASSE'] );
                $obj->setDtInvestidura( $row['DT_INVESTIDURA'] );
                $obj->setImgCertificado( $row['IMG_CERTIFICADO'] );
                $retorno->addInvestidura( $obj );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
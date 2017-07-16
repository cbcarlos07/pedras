<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class usuarioDao
{
    private $connection =  null;
  public function insert( usuario $usuario ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO usuario 
                    (DS_LOGIN, NM_USUARIO, DS_SENHA, SN_ATIVO, CD_NIVEL, SN_SENHA_ATUAL) 
                  VALUES 
                    (:login, :usuario, MD5(:senha), :ativo, :nivel, 'N')";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":login", $usuario->getDsLogin(), PDO::PARAM_STR );
            $stmt->bindValue( ":usuario", $usuario->getNmUsuario(), PDO::PARAM_STR );
            $stmt->bindValue( ":senha", $usuario->getDsSenha(), PDO::PARAM_STR );
            $stmt->bindValue( ":ativo", $usuario->getSnAtivo(), PDO::PARAM_STR );
            $stmt->bindValue( ":nivel", $usuario->getNivel()->getCdNivel(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( usuario $usuario ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE usuario SET 
                      DS_LOGIN    = :login
                     ,NM_USUARIO  = :usuario
                     ,DS_SENHA    = MD5(:senha)
                     ,SN_ATIVO    = :ativo
                     ,CD_NIVEL    = :nivel
                     ,SN_SENHA_ATUAL = 'N'   
                     WHERE CD_USUARIO = :codigo";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":login", $usuario->getDsLogin(), PDO::PARAM_STR );
            $stmt->bindValue( ":usuario", $usuario->getNmUsuario(), PDO::PARAM_STR );
            $stmt->bindValue( ":senha", $usuario->getDsSenha(), PDO::PARAM_STR );
            $stmt->bindValue( ":ativo", $usuario->getSnAtivo(), PDO::PARAM_STR );
            $stmt->bindValue( ":nivel", $usuario->getNivel()->getCdNivel(), PDO::PARAM_INT );
            $stmt->bindValue( ":codigo", $usuario->getCdUsuario(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function updateSenha( usuario $usuario ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE usuario SET 
                      DS_SENHA    = MD5(:senha)
                     ,SN_SENHA_ATUAL = 'S'   
                     WHERE CD_USUARIO = :codigo";
            $stmt = $this->connection->prepare( $query );

            $stmt->bindValue( ":senha", $usuario->getDsSenha(), PDO::PARAM_STR );
            $stmt->bindValue( ":ativo", $usuario->getSnAtivo(), PDO::PARAM_STR );
            $stmt->bindValue( ":codigo", $usuario->getCdUsuario(), PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $usuario ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM usuario WHERE CD_USUARIO = :usuario";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":usuario", $usuario, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getUsuario ( $usuario ){
        require_once "class.connection.php";
        require_once "../model/class.usuario.php";
        require_once "../model/class.nivel.php";
        $retorno = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM usuario WHERE CD_USUARIO = :usuario";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":usuario", $usuario, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new usuario();
                $retorno->setCdUsuario( $row['CD_USUARIO'] );
                $retorno->setDsLogin( $row['DS_LOGIN'] );
                $retorno->setNmUsuario( $row['NM_USUARIO'] );
                $retorno->setDsSenha( $row['DS_SENHA'] );
                $retorno->setNivel( new nivel() );
                $retorno->getNivel()->getCdNivel( $row['CD_NIVEL'] );
                $retorno->setSnAtivo( $row['SN_ATIVO'] );
                $retorno->setSnSenhaAtual( $row['SN_SENHA_ATUAL'] );


            }

            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getListNivel ( $usuario ){
        require_once "class.connection.php";
        require_once "../model/class.usuario.php";
        require_once "../services/class.usuarioList.php";
        $userList = new usuarioList();
        $this->connection = new connection();

        try{
            if( $usuario == "" ){
                $query = "SELECT U.*, N.DS_NIVEL FROM usuario U JOIN nivel N WHERE N.CD_NIVEL = U.CD_NIVEL";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT U.*, N.DS_NIVEL FROM usuario U JOIN nivel N 
                            WHERE U.NM_USUARIO LIKE :usuario
                            AND U.CD_NIVEL = N.CD_NIVEL ";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":usuario", "%$usuario%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new usuario();
                $retorno->setCdUsuario( $row['CD_USUARIO'] );
                $retorno->setDsLogin( $row['DS_LOGIN'] );
                $retorno->setNmUsuario( $row['NM_USUARIO'] );
                $retorno->setDsSenha( $row['DS_SENHA'] );
                $retorno->setNivel( new nivel() );
                $retorno->getNivel()->getCdNivel( $row['CD_NIVEL'] );
                $retorno->setSnAtivo( $row['SN_ATIVO'] );
                $retorno->setSnSenhaAtual( $row['SN_SENHA_ATUAL'] );
                $userList->addUsuario( $retorno );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $userList;
    }

    public function loginUser ( $usuario, $senha ){
        require_once "class.connection.php";
        require_once "../model/class.usuario.php";
        require_once "../services/class.usuarioList.php";
        $userList = new usuarioList();
        $this->connection = new connection();

        try{

                $query = "SELECT * FROM usuario WHERE NM_USUARIO = :usuario AND DS_SENHA = :senha";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":usuario", $usuario, PDO::PARAM_STR );
                $stmt->bindValue( ":senha", $senha, PDO::PARAM_STR );


            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $retorno = new usuario();
                $retorno->setCdUsuario( $row['CD_USUARIO'] );
                $retorno->setDsLogin( $row['DS_LOGIN'] );
                $retorno->setNmUsuario( $row['NM_USUARIO'] );
                $retorno->setDsSenha( $row['DS_SENHA'] );
                $retorno->setNivel( new nivel() );
                $retorno->getNivel()->getCdNivel( $row['CD_NIVEL'] );
                $retorno->setSnAtivo( $row['SN_ATIVO'] );
                $retorno->setSnSenhaAtual( $row['SN_SENHA_ATUAL'] );
                $userList->addUsuario( $retorno );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $userList;
    }
}
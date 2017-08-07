<?php
/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 26/07/2017
 * Time: 13:33
 */

include "../includes/error.php";

 $acao = $_POST['acao'];
 $login   = "";
 $senha   = "";
 $lembrar = "";
 $nivel   = 0;
 $nome    = "";
 $ativo   = "";
 $codigo  = 0;

 if( isset( $_POST['login'] ) ){
     $login = $_POST['login'];
 }

if( isset( $_POST['codigo'] ) ){
    $codigo = $_POST['codigo'];
}

 if( isset( $_POST['senha'] ) ){
     $senha = $_POST['senha'];
 }

 if( isset( $_POST['lembrar'] ) ){
     $lembrar = $_POST['lembrar'];
 }

  if( isset( $_POST['nome'] ) ){
    $nome = $_POST['nome'];
  }

if( isset( $_POST['nivel'] ) ){
    $nivel = $_POST['nivel'];
}

if( isset( $_POST['ativo'] ) ){
    $ativo = $_POST['ativo'];
}



 switch ( $acao ){
     case 'L':
         logar( $login, $senha, $lembrar );
         break;
     case 'G':
         getListUsuarios();
         break;
     case 'V':
         verificarLogin( $login );
         break;
     case 'I':
         inserirUsuario( $login, $nome, $senha, $nivel, $ativo  );
         break;
 }



 function logar( $login, $senha, $lembrar ){
     require_once "../controller/class.usuarioController.php";
     $usuarioController = new usuarioController();

     $usuario = $usuarioController->loginUser( $login, $senha );
    // var_dump($usuario);
     if( $usuario != null){
         session_start();
         if( $usuario->getSnSenhaAtual() == 'S' ){

             if( $lembrar == 'S' ){
                 $ck_login  = "login";
                 $ck_vlogin = $login;
                 setcookie( $ck_login, $ck_vlogin, time() + ( 86400 * 30 ), "/" ); //86400 = 1 dia

                 $ck_pwd  = "senha";
                 $ck_vpwd = $senha;
                 setcookie( $ck_pwd, $ck_vpwd, time() + ( 86400 * 30 ), "/" ); //86400 = 1 dia

                 $ck_remember  = "checked";
                 $ck_vremember = 'S';
                 setcookie( $ck_remember, $ck_vremember, time() + ( 86400 * 30 ), "/" ); //86400 = 1 dia
             }

             $_SESSION['login'] = $login;
             $nome = explode(" ", $usuario->getNmUsuario() );
             $_SESSION['nome'] = $nome[0];
             $_SESSION['sobrenome'] = $nome[count($nome) - 1];
             $retorno['sucesso'] = 1;
             $retorno['codigo']  = $usuario->getCdUsuario();
             echo json_encode( $retorno );


         }else{
             $_SESSION['login'] = $login;
             $retorno['sucesso'] = 0;
             $retorno['codigo']  = $usuario->getCdUsuario();
             echo json_encode( $retorno );

         }

     }else{

         echo json_encode( array( "sucesso" => -1 ) );
     }
 }

 function getListUsuarios(  ){
     require_once "../controller/class.usuarioController.php";
     require_once "../services/class.usuarioListIterator.php";
     $usuarioController = new usuarioController();
     $lista = $usuarioController->getListUsuario("");
     $usuarioList = new usuarioListIterator( $lista );
     $usuarios = array();
     while ( $usuarioList->hasNextUsuario() ){
         $usuario = $usuarioList->getNextUsuario();
         $usuarios[] = array(
             "codigo"  => $usuario->getCdUsuario(),
             "login"   => $usuario->getDsLogin(),
             "nome"    => $usuario->getNmUsuario(),
             "nivel"   => $usuario->getNivel()->getDsNivel(),
             "ativo"   => $usuario->getSnAtivo()
         );

     }
     echo json_encode( array( "usuarios" => $usuarios ) );
 }

  function verificarLogin( $login ){
     //echo "VerificarLogin";
     require_once "../controller/class.usuarioController.php";
     $usuarioController = new usuarioController();
     $retorno = $usuarioController->verificaUsername( $login );

     if( $retorno ){
         echo json_encode( array( "retorno" => 1 ));
     }else{
         echo json_encode( array( "retorno" => 0 ));
     }
  }

  function inserirUsuario( $login, $nome, $senha, $nivel, $ativo ){
      require_once "../controller/class.usuarioController.php";
      require_once "../model/class.usuario.php";
      require_once "../model/class.nivel.php";

      $usuarioController = new usuarioController();
      $usuario = new usuario();
      $usuario->setDsLogin( $login );
      $usuario->setNmUsuario( $nome );
      $usuario->setDsSenha( $senha );
      $usuario->setNivel( new nivel() );
      $usuario->getNivel()->setCdNivel( $nivel );
      $usuario->setSnAtivo( $ativo );
      $retorno = $usuarioController->insert( $usuario );
      if( $retorno ){
          echo json_encode( array( "retorno" => 1 ) );
      }else{
          echo json_encode( array( "retorno" => 0 ) );
      }
  }


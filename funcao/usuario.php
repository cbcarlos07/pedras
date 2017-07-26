<?php
/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 26/07/2017
 * Time: 13:33
 */

 $acao = $_POST['acao'];



 function logar( $usuario, $senha ){
     require_once "../controller/class.usuarioController.php";
     $usuarioController = new usuarioController();
     $teste = $usuarioController->loginUser( $usuario, $senha );
     if( $teste == 1 ){
         session_start();
         $_SESSION['usuario'] = $usuario;
         echo json_encode( array( "retorno" => 1 ) );
     }else{
         echo json_encode( array( "retorno" => 0 ) );
     }
 }
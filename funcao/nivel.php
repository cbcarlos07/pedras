<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 03/08/17
 * Time: 21:44
 */
  $acao = $_POST['acao'];

  switch ($acao){
      case 'L':
          getListNivel();
          break;
  }

  function getListNivel(  ){
      require_once "../controller/class.nivelController.php";
      require_once "../model/class.nivel.php";
      require_once "../services/class.nivelListIterator.php";
      $niveController = new nivelController();
      $lista = $niveController->getListNivel("");
      $nivelList = new nivelListIterator( $lista );
      $niveis = array();
      while ( $nivelList->hasNextNivel() ){
          $nivel = $nivelList->getNextNivel();
          $niveis[] = array(
              "codigo"    => $nivel->getCdNivel(),
              "descricao" => $nivel->getDsNivel()
          );
      }
      echo json_encode( array( "niveis" => $niveis ) );

  }



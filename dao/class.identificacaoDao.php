<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:55
 */
class identificacaoDao
{
    private $connection =  null;
  public function insert( identificacao $identificacao ){
         require_once "class.connection.php";
         $retorno = false;
         $this->connection = new connection();
         $this->connection->beginTransaction();
         try{
            $query = "INSERT INTO identificacao 
                      (CD_DESB, NR_CARTAO_SUS, SN_POSSUI_PLANO, DS_PLANO, DADO_CARTAO_VAC, VIVE_COM
                      ,DS_OUTRO_VIVE, DOENCA, SN_ALERGIA, DS_ALERGIA, SN_DOENCA_CORACAO
                      ,DS_DOENCA_CORACAO, SN_FAZ_ACOM_CORACAO, DS_LOCAL_MEDIC_CORACAO, SN_ALERGIA_MEDICAMENTO, DS_ALERGIA_MEDICAMENTO
                      ,SN_INTOLERANCIA_LACTOSE, SN_DEFICIENCIA_VIT_NUT, DS_DEFICIENCIA_VIT_NUT, SN_DESMAIO_CONVULSAO, DT_ULTIM_DESMAIO_CONVULSAO
                      ,SN_TOMA_MEDICACAO, DS_TOMA_MEDICACAO, DS_PRAQUE_TOMA_MEDICACAO, SN_ACOMP_MEDIC_TOMA_MEDICACAO,SN_DIABETES
                      ,SN_FAZ_TRAT_DIABETES, DS_FAZ_TRAT_DIABETES,  SN_ALGUMA_CIRURGIA, DS_ALGUMA_CIRURGIA, SN_ESTEVE_INTERNADO
                      ,DS_ESTEVE_INTERNADO,GRUPO_SANG, FATOR_RH, SN_RECEBEU_TRANSFUSAO_SANG, DT_RECEBEU_TRANSFUSAO_SANG, OBSERVACAO
                      , NM_RESPONSAVEL, DT_ASSINATURA
                      )
                      VALUES 
                      (:desb, :sus, :snplano, :plano, :vacina, :vivecom
                      ,:dsvivecom, :doenca, :alergia, :dsalergia, :sncoracao
                      ,:dsdoencacoracao, :snfazacomcoracao, :localmedcoracao, :snalergiamed, :dsalergiamed
                      ,:snlactose, :sndefvitnut, :dsdefvitnut, :sndesmaio, :dtdesmaio
                      ,:snmedicacao, :dsmedicacao, :praquemedicacao, :acommedicacao, :sndiabetes
                      ,:sntratdiabetes, :dstratdiabetes,  :sncirurgia, :dscirurgia, :sninternado, :dsinternado
                      ,:gruposang, :fatorrh, :sntransf, :dtrectrans, :observacao
                      ,:responavel, :dttassinatura
                      )";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb", $identificacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT);
            $stmt->bindValue( ":sus", $identificacao->getNrCartaoSUS(), PDO::PARAM_STR );
            $stmt->bindValue( ":snplano", $identificacao->getSnPossuiPlano(), PDO::PARAM_STR );
            $stmt->bindValue( ":plano", $identificacao->getDsPlano(), PDO::PARAM_STR );
            $stmt->bindValue( ":vacina", $identificacao->getDadoCartaoVac(), PDO::PARAM_STR );
            $stmt->bindValue( ":vivecom", $identificacao->getViveCom(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsvivecom", $identificacao->getDsOutroVive(), PDO::PARAM_STR );
            $stmt->bindValue( ":doenca", $identificacao->getDoenca(), PDO::PARAM_STR );
            $stmt->bindValue( ":alergia", $identificacao->getDsAlergia(), PDO::PARAM_STR );
            $stmt->bindValue( ":sncoracao", $identificacao->getSnDoencaCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsdoencacoracao", $identificacao->getDsDoencaCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snfazacomcoracao", $identificacao->getSnFazAcomCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":localmedcoracao", $identificacao->getDsLocalMedicCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snalergiamed", $identificacao->getSnAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsalergiamed", $identificacao->getDsAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":snlactose", $identificacao->getSnIntoleranciaLactose(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndefvitnut", $identificacao->getSnDeficienciaVitNut(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsdefvitnut", $identificacao->getDsAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndesmaio", $identificacao->getSnDesmaioConvulsao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtdesmaio", $identificacao->getDtUltimDesmaioConvulsao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snmedicacao", $identificacao->getSnTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsmedicacao", $identificacao->getDsTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":praquemedicacao", $identificacao->getDsPraqueTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":acommedicacao", $identificacao->getSnAcompMedicTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndiabetes", $identificacao->getSnDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":sntratdiabetes", $identificacao->getSnFazTratDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":dstratdiabetes", $identificacao->getDsFazTratDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":sncirurgia", $identificacao->getSnAlgumaCirurgia(), PDO::PARAM_STR );
            $stmt->bindValue( ":dscirurgia", $identificacao->getDsAlgumaCirurgia(), PDO::PARAM_STR );
            $stmt->bindValue( ":sninternado", $identificacao->getSnEsteveInternado(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsinternado", $identificacao->getDsEsteveInternado(), PDO::PARAM_STR );
            $stmt->bindValue( ":gruposang", $identificacao->getGrupoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":fatorrh", $identificacao->getFatorRH(), PDO::PARAM_STR );
            $stmt->bindValue( ":sntransf", $identificacao->getSnRecebeuTransfusaoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtrectrans", $identificacao->getDtRecebeuTransfusaoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $identificacao->getObservacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":responavel", $identificacao->getNmResponsavel(), PDO::PARAM_STR );
            $stmt->bindValue( ":dttassinatura", $identificacao->getDtAssinatura(), PDO::PARAM_STR );

            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
         }catch (PDOException $ex){
             echo "Erro: ".$ex->getMessage();
         }
         return $retorno;
  }

    public function update( identificacao $identificacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "UPDATE identificacao SET 
                       NR_CARTAO_SUS = :sus, SN_POSSUI_PLANO = :snplano, DS_PLANO = :plano, DADO_CARTAO_VAC = :vacina,  VIVE_COM = :vivecom
                      ,DS_OUTRO_VIVE = :dsvivecom, DOENCA = :doenca, SN_ALERGIA = :alergia, DS_ALERGIA = :dsalergia, SN_DOENCA_CORACAO = :sncoracao
                      ,DS_DOENCA_CORACAO = :dsdoencacoracao, SN_FAZ_ACOM_CORACAO = :snfazacomcoracao, DS_LOCAL_MEDIC_CORACAO = :localmedcoracao, SN_ALERGIA_MEDICAMENTO = :snalergiamed, DS_ALERGIA_MEDICAMENTO = :dsalergiamed 
                      ,SN_INTOLERANCIA_LACTOSE = :snlactose, SN_DEFICIENCIA_VIT_NUT = :sndefvitnut, DS_DEFICIENCIA_VIT_NUT = :dsdefvitnut, SN_DESMAIO_CONVULSAO = :sndesmaio, DT_ULTIM_DESMAIO_CONVULSAO = :dtdesmaio
                      ,SN_TOMA_MEDICACAO = :snmedicacao, DS_TOMA_MEDICACAO = :dsmedicacao, DS_PRAQUE_TOMA_MEDICACAO = :praquemedicacao, SN_ACOMP_MEDIC_TOMA_MEDICACAO = :acommedicacao,SN_DIABETES = :sndiabetes
                      ,SN_FAZ_TRAT_DIABETES = :sntratdiabetes, DS_FAZ_TRAT_DIABETES = :dstratdiabetes,  SN_ALGUMA_CIRURGIA = :sncirurgia, DS_ALGUMA_CIRURGIA = :dscirurgia, SN_ESTEVE_INTERNADO = :sninternado
                      ,DS_ESTEVE_INTERNADO = :dsinternado, GRUPO_SANG = :gruposang, FATOR_RH = :fatorrh, SN_RECEBEU_TRANSFUSAO_SANG = :sntransf, DT_RECEBEU_TRANSFUSAO_SANG = :dtrectrans, OBSERVACAO = :observacao
                      , NM_RESPONSAVEL = :responavel, DT_ASSINATURA = :dttassinatura
                      WHERE CD_DESB = :desb";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":desb", $identificacao->getDesbravador()->getCdDesb(), PDO::PARAM_INT);
            $stmt->bindValue( ":sus", $identificacao->getNrCartaoSUS(), PDO::PARAM_STR );
            $stmt->bindValue( ":snplano", $identificacao->getSnPossuiPlano(), PDO::PARAM_STR );
            $stmt->bindValue( ":plano", $identificacao->getDsPlano(), PDO::PARAM_STR );
            $stmt->bindValue( ":vacina", $identificacao->getDadoCartaoVac(), PDO::PARAM_STR );
            $stmt->bindValue( ":vivecom", $identificacao->getViveCom(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsvivecom", $identificacao->getDsOutroVive(), PDO::PARAM_STR );
            $stmt->bindValue( ":doenca", $identificacao->getDoenca(), PDO::PARAM_STR );
            $stmt->bindValue( ":alergia", $identificacao->getDsAlergia(), PDO::PARAM_STR );
            $stmt->bindValue( ":sncoracao", $identificacao->getSnDoencaCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsdoencacoracao", $identificacao->getDsDoencaCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snfazacomcoracao", $identificacao->getSnFazAcomCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":localmedcoracao", $identificacao->getDsLocalMedicCoracao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snalergiamed", $identificacao->getSnAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsalergiamed", $identificacao->getDsAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":snlactose", $identificacao->getSnIntoleranciaLactose(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndefvitnut", $identificacao->getSnDeficienciaVitNut(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsdefvitnut", $identificacao->getDsAlergiaMedicamento(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndesmaio", $identificacao->getSnDesmaioConvulsao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtdesmaio", $identificacao->getDtUltimDesmaioConvulsao(), PDO::PARAM_STR );
            $stmt->bindValue( ":snmedicacao", $identificacao->getSnTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsmedicacao", $identificacao->getDsTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":praquemedicacao", $identificacao->getDsPraqueTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":acommedicacao", $identificacao->getSnAcompMedicTomaMedicacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":sndiabetes", $identificacao->getSnDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":sntratdiabetes", $identificacao->getSnFazTratDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":dstratdiabetes", $identificacao->getDsFazTratDiabetes(), PDO::PARAM_STR );
            $stmt->bindValue( ":sncirurgia", $identificacao->getSnAlgumaCirurgia(), PDO::PARAM_STR );
            $stmt->bindValue( ":dscirurgia", $identificacao->getDsAlgumaCirurgia(), PDO::PARAM_STR );
            $stmt->bindValue( ":sninternado", $identificacao->getSnEsteveInternado(), PDO::PARAM_STR );
            $stmt->bindValue( ":dsinternado", $identificacao->getDsEsteveInternado(), PDO::PARAM_STR );
            $stmt->bindValue( ":gruposang", $identificacao->getGrupoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":fatorrh", $identificacao->getFatorRH(), PDO::PARAM_STR );
            $stmt->bindValue( ":sntransf", $identificacao->getSnRecebeuTransfusaoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":dtrectrans", $identificacao->getDtRecebeuTransfusaoSang(), PDO::PARAM_STR );
            $stmt->bindValue( ":observacao", $identificacao->getObservacao(), PDO::PARAM_STR );
            $stmt->bindValue( ":responavel", $identificacao->getNmResponsavel(), PDO::PARAM_STR );
            $stmt->bindValue( ":dttassinatura", $identificacao->getDtAssinatura(), PDO::PARAM_STR );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function delete( $identificacao ){
        require_once "class.connection.php";
        $retorno = false;
        $this->connection = new connection();
        $this->connection->beginTransaction();
        try{
            $query = "DELETE FROM identificacao WHERE CD_DESB = :identificacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":identificacao", $identificacao, PDO::PARAM_INT );
            $stmt->execute();
            $this->connection->commit();
            $retorno = true;
            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }

    public function getIdentificacao ( $identificacao ){
        require_once "class.connection.php";
        require_once "../model/class.identificacao.php";
        require_once "../model/class.desbravador.php";
        $obj = null;
        $this->connection = new connection();

        try{
            $query = "SELECT * FROM identificacao I WHERE CD_DESB = :identificacao";
            $stmt = $this->connection->prepare( $query );
            $stmt->bindValue( ":identificacao", $identificacao, PDO::PARAM_INT );
            $stmt->execute();
            if( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $obj = new identificacao();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->setNrCartaoSUS( $row['NR_CARTAO_SUS'] );
                $obj->setSnPossuiPlano( $row['SN_POSSUI_PLANO'] );
                $obj->setDsPlano( $row['DS_PLANO'] );
                $obj->setDadoCartaoVac( $row['DADO_CARTAO_VAC'] );
                $obj->setViveCom( $row['VIVE_COM'] );
                $obj->setDsOutroVive( $row['DS_OUTRO_VIVE'] );
                $obj->setDoenca( $row['DOENCA'] );
                $obj->setSnAlergia( $row['SN_ALERGIA'] );
                $obj->setDsAlergia( $row['DS_ALERGIA'] );
                $obj->setSnDoencaCoracao( $row['SN_DOENCA_CORACAO'] );
                $obj->setDsDoencaCoracao( $row['DS_DOENCA_CORACAO'] );
                $obj->setSnFazAcomCoracao( $row['SN_FAZ_ACOM_CORACAO'] );
                $obj->setDsLocalMedicCoracao( $row['DS_LOCAL_MEDIC_CORACAO'] );
                $obj->setSnAlergiaMedicamento( $row['SN_ALERGIA_MEDICAMENTO'] );
                $obj->setDsAlergiaMedicamento( $row['DS_ALERGIA_MEDICAMENTO'] );
                $obj->setSnIntoleranciaLactose( $row['SN_INTOLERANCIA_LACTOSE'] );
                $obj->setSnDeficienciaVitNut( $row['SN_DEFICIENCIA_VIT_NUT'] );
                $obj->setDsDeficienciaVitNut( $row['DS_DEFICIENCIA_VIT_NUT'] );
                $obj->setSnDesmaioConvulsao( $row['SN_DESMAIO_CONVULSAO'] );
                $obj->setDtUltimDesmaioConvulsao( $row['DT_ULTIM_DESMAIO_CONVULSAO'] );
                $obj->setSnTomaMedicacao( $row['SN_TOMA_MEDICACAO'] );
                $obj->setDsTomaMedicacao( $row['DS_TOMA_MEDICACAO'] );
                $obj->setDsPraqueTomaMedicacao( $row['DS_PRAQUE_TOMA_MEDICACAO'] );
                $obj->setSnAcompMedicTomaMedicacao( $row['SN_ACOMP_MEDIC_TOMA_MEDICACAO'] );
                $obj->setSnDiabetes( $row['SN_DIABETES'] );
                $obj->setSnFazTratDiabetes( $row['SN_FAZ_TRAT_DIABETES'] );
                $obj->setDsFazTratDiabetes( $row['DS_FAZ_TRAT_DIABETES'] );
                $obj->setSnAlgumaCirurgia( $row['SN_ALGUMA_CIRURGIA'] );
                $obj->setDsAlgumaCirurgia( $row['DS_ALGUMA_CIRURGIA'] );
                $obj->setSnEsteveInternado( $row['SN_ESTEVE_INTERNADO'] );
                $obj->setDsEsteveInternado( $row['DS_ESTEVE_INTERNADO'] );
                $obj->setGrupoSang( $row['GRUPO_SANG'] );
                $obj->setFatorRH( $row['FATOR_RH'] );
                $obj->setSnRecebeuTransfusaoSang( $row['SN_RECEBEU_TRANSFUSAO_SANG'] );
                $obj->setDtRecebeuTransfusaoSang( $row['DT_RECEBEU_TRANSFUSAO_SANG'] );
                $obj->setObservacao( $row['OBSERVACAO'] );
                $obj->setNmResponsavel( $row['NM_RESPONSAVEL'] );
                $obj->setDtAssinatura( $row['DT_ASSINATURA'] );

            }

            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $obj;
    }

    public function getListIdentificacao( $identificacao ){
        require_once "class.connection.php";
        require_once "../model/class.identificacao.php";
        require_once "../model/class.desbravador.php";
        require_once "../services/class.identificacaoList.php";
        $retorno = new identificacaoList();
        $this->connection = new connection();

        try{
            if( $identificacao == "" ){
                $query = "SELECT I.*, D.NM_DESBRAVADOR FROM identificacao I
                          INNER JOIN desbravador D ON I.CD_DESB = D.CD_DESB";
                $stmt = $this->connection->prepare( $query );
            }else{
                $query = "SELECT I.*, D.NM_DESBRAVADOR 
                          FROM identificacao I 
                          INNER JOIN desbravador D ON I.CD_DESB = D.CD_DESB
                          WHERE D.NM_DESBRAVADOR LIKE :identificacao";
                $stmt = $this->connection->prepare( $query );
                $stmt->bindValue( ":identificacao", "%$identificacao%", PDO::PARAM_STR );
            }

            $stmt->execute();
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
                $level = new identificacao();
                $obj = new identificacao();
                $obj->setDesbravador( new desbravador() );
                $obj->getDesbravador()->setCdDesb( $row['CD_DESB'] );
                $obj->getDesbravador()->setNmDesbravador( $row['NM_DESBRAVADOR'] );
                $obj->setNrCartaoSUS( $row['NR_CARTAO_SUS'] );
                $obj->setSnPossuiPlano( $row['SN_POSSUI_PLANO'] );
                $obj->setDsPlano( $row['DS_PLANO'] );
                $obj->setDadoCartaoVac( $row['DADO_CARTAO_VAC'] );
                $obj->setViveCom( $row['VIVE_COM'] );
                $obj->setDsOutroVive( $row['DS_OUTRO_VIVE'] );
                $obj->setDoenca( $row['DOENCA'] );
                $obj->setSnAlergia( $row['SN_ALERGIA'] );
                $obj->setDsAlergia( $row['DS_ALERGIA'] );
                $obj->setSnDoencaCoracao( $row['SN_DOENCA_CORACAO'] );
                $obj->setDsDoencaCoracao( $row['DS_DOENCA_CORACAO'] );
                $obj->setSnFazAcomCoracao( $row['SN_FAZ_ACOM_CORACAO'] );
                $obj->setDsLocalMedicCoracao( $row['DS_LOCAL_MEDIC_CORACAO'] );
                $obj->setSnAlergiaMedicamento( $row['SN_ALERGIA_MEDICAMENTO'] );
                $obj->setDsAlergiaMedicamento( $row['DS_ALERGIA_MEDICAMENTO'] );
                $obj->setSnIntoleranciaLactose( $row['SN_INTOLERANCIA_LACTOSE'] );
                $obj->setSnDeficienciaVitNut( $row['SN_DEFICIENCIA_VIT_NUT'] );
                $obj->setDsDeficienciaVitNut( $row['DS_DEFICIENCIA_VIT_NUT'] );
                $obj->setSnDesmaioConvulsao( $row['SN_DESMAIO_CONVULSAO'] );
                $obj->setDtUltimDesmaioConvulsao( $row['DT_ULTIM_DESMAIO_CONVULSAO'] );
                $obj->setSnTomaMedicacao( $row['SN_TOMA_MEDICACAO'] );
                $obj->setDsTomaMedicacao( $row['DS_TOMA_MEDICACAO'] );
                $obj->setDsPraqueTomaMedicacao( $row['DS_PRAQUE_TOMA_MEDICACAO'] );
                $obj->setSnAcompMedicTomaMedicacao( $row['SN_ACOMP_MEDIC_TOMA_MEDICACAO'] );
                $obj->setSnDiabetes( $row['SN_DIABETES'] );
                $obj->setSnFazTratDiabetes( $row['SN_FAZ_TRAT_DIABETES'] );
                $obj->setDsFazTratDiabetes( $row['DS_FAZ_TRAT_DIABETES'] );
                $obj->setSnAlgumaCirurgia( $row['SN_ALGUMA_CIRURGIA'] );
                $obj->setDsAlgumaCirurgia( $row['DS_ALGUMA_CIRURGIA'] );
                $obj->setSnEsteveInternado( $row['SN_ESTEVE_INTERNADO'] );
                $obj->setDsEsteveInternado( $row['DS_ESTEVE_INTERNADO'] );
                $obj->setGrupoSang( $row['GRUPO_SANG'] );
                $obj->setFatorRH( $row['FATOR_RH'] );
                $obj->setSnRecebeuTransfusaoSang( $row['SN_RECEBEU_TRANSFUSAO_SANG'] );
                $obj->setDtRecebeuTransfusaoSang( $row['DT_RECEBEU_TRANSFUSAO_SANG'] );
                $obj->setObservacao( $row['OBSERVACAO'] );
                $obj->setNmResponsavel( $row['NM_RESPONSAVEL'] );
                $obj->setDtAssinatura( $row['DT_ASSINATURA'] );
                $retorno->addIdentificacao( $level );
            }


            $this->connection = null;
        }catch (PDOException $ex){
            echo "Erro: ".$ex->getMessage();
        }
        return $retorno;
    }
}
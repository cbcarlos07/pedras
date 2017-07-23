<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 17:39
 */
class identificacao
{
 private $desbravador;
 private $nrCartaoSUS;
 private $snPossuiPlano;
 private $dsPlano;
 private $dadoCartaoVac;
 private $viveCom;
 private $dsOutroVive;
 private $doenca;
 private $snAlergia;
 private $dsAlergia;
 private $snDoencaCoracao;
 private $dsDoencaCoracao;
 private $snFazAcomCoracao;
 private $dsLocalMedicCoracao;
 private $snAlergiaMedicamento;
 private $dsAlergiaMedicamento;
 private $snIntoleranciaLactose;
 private $snDeficienciaVitNut;
 private $dsDeficienciaVitNut;
 private $snDesmaioConvulsao;
 private $dtUltimDesmaioConvulsao;
 private $snTomaMedicacao;
 private $dsTomaMedicacao;
 private $dsPraqueTomaMedicacao;
 private $snAcompMedicTomaMedicacao;
 private $snDiabetes;
 private $snFazTratDiabetes;
 private $dsFazTratDiabetes;
 private $snAlgumaCirurgia;
 private $dsAlgumaCirurgia;
 private $snEsteveInternado;
 private $dsEsteveInternado;
 private $grupoSang;
 private $fatorRH;
 private $snRecebeuTransfusaoSang;
 private $dtRecebeuTransfusaoSang;
 private $observacao;
 private $nmResponsavel;
 private $dtAssinatura;

    /**
     * @return mixed
     */
    public function getSnAlergia()
    {
        return $this->snAlergia;
    }

    /**
     * @param mixed $snAlergia
     * @return identificacao
     */
    public function setSnAlergia($snAlergia)
    {
        $this->snAlergia = $snAlergia;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getDsAlgumaCirurgia()
    {
        return $this->dsAlgumaCirurgia;
    }

    /**
     * @param mixed $dsAlgumaCirurgia
     * @return identificacao
     */
    public function setDsAlgumaCirurgia($dsAlgumaCirurgia)
    {
        $this->dsAlgumaCirurgia = $dsAlgumaCirurgia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesbravador()
    {
        return $this->desbravador;
    }

    /**
     * @param mixed $desbravador
     * @return identificacao
     */
    public function setDesbravador( desbravador $desbravador)
    {
        $this->desbravador = $desbravador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNrCartaoSUS()
    {
        return $this->nrCartaoSUS;
    }

    /**
     * @param mixed $nrCartaoSUS
     * @return identificacao
     */
    public function setNrCartaoSUS($nrCartaoSUS)
    {
        $this->nrCartaoSUS = $nrCartaoSUS;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnPossuiPlano()
    {
        return $this->snPossuiPlano;
    }

    /**
     * @param mixed $snPossuiPlano
     * @return identificacao
     */
    public function setSnPossuiPlano($snPossuiPlano)
    {
        $this->snPossuiPlano = $snPossuiPlano;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsPlano()
    {
        return $this->dsPlano;
    }

    /**
     * @param mixed $dsPlano
     * @return identificacao
     */
    public function setDsPlano($dsPlano)
    {
        $this->dsPlano = $dsPlano;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDadoCartaoVac()
    {
        return $this->dadoCartaoVac;
    }

    /**
     * @param mixed $dadoCartaoVac
     * @return identificacao
     */
    public function setDadoCartaoVac($dadoCartaoVac)
    {
        $this->dadoCartaoVac = $dadoCartaoVac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getViveCom()
    {
        return $this->viveCom;
    }

    /**
     * @param mixed $viveCom
     * @return identificacao
     */
    public function setViveCom($viveCom)
    {
        $this->viveCom = $viveCom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsOutroVive()
    {
        return $this->dsOutroVive;
    }

    /**
     * @param mixed $dsOutroVive
     * @return identificacao
     */
    public function setDsOutroVive($dsOutroVive)
    {
        $this->dsOutroVive = $dsOutroVive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDoenca()
    {
        return $this->doenca;
    }

    /**
     * @param mixed $doenca
     * @return identificacao
     */
    public function setDoenca($doenca)
    {
        $this->doenca = $doenca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsAlergia()
    {
        return $this->dsAlergia;
    }

    /**
     * @param mixed $dsAlergia
     * @return identificacao
     */
    public function setDsAlergia($dsAlergia)
    {
        $this->dsAlergia = $dsAlergia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnDoencaCoracao()
    {
        return $this->snDoencaCoracao;
    }

    /**
     * @param mixed $snDoencaCoracao
     * @return identificacao
     */
    public function setSnDoencaCoracao($snDoencaCoracao)
    {
        $this->snDoencaCoracao = $snDoencaCoracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsDoencaCoracao()
    {
        return $this->dsDoencaCoracao;
    }

    /**
     * @param mixed $dsDoencaCoracao
     * @return identificacao
     */
    public function setDsDoencaCoracao($dsDoencaCoracao)
    {
        $this->dsDoencaCoracao = $dsDoencaCoracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnFazAcomCoracao()
    {
        return $this->snFazAcomCoracao;
    }

    /**
     * @param mixed $snFazAcomCoracao
     * @return identificacao
     */
    public function setSnFazAcomCoracao($snFazAcomCoracao)
    {
        $this->snFazAcomCoracao = $snFazAcomCoracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsLocalMedicCoracao()
    {
        return $this->dsLocalMedicCoracao;
    }

    /**
     * @param mixed $dsLocalMedicCoracao
     * @return identificacao
     */
    public function setDsLocalMedicCoracao($dsLocalMedicCoracao)
    {
        $this->dsLocalMedicCoracao = $dsLocalMedicCoracao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnAlergiaMedicamento()
    {
        return $this->snAlergiaMedicamento;
    }

    /**
     * @param mixed $snAlergiaMedicamento
     * @return identificacao
     */
    public function setSnAlergiaMedicamento($snAlergiaMedicamento)
    {
        $this->snAlergiaMedicamento = $snAlergiaMedicamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsAlergiaMedicamento()
    {
        return $this->dsAlergiaMedicamento;
    }

    /**
     * @param mixed $dsAlergiaMedicamento
     * @return identificacao
     */
    public function setDsAlergiaMedicamento($dsAlergiaMedicamento)
    {
        $this->dsAlergiaMedicamento = $dsAlergiaMedicamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnIntoleranciaLactose()
    {
        return $this->snIntoleranciaLactose;
    }

    /**
     * @param mixed $snIntoleranciaLactose
     * @return identificacao
     */
    public function setSnIntoleranciaLactose($snIntoleranciaLactose)
    {
        $this->snIntoleranciaLactose = $snIntoleranciaLactose;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnDeficienciaVitNut()
    {
        return $this->snDeficienciaVitNut;
    }

    /**
     * @param mixed $snDeficienciaVitNut
     * @return identificacao
     */
    public function setSnDeficienciaVitNut($snDeficienciaVitNut)
    {
        $this->snDeficienciaVitNut = $snDeficienciaVitNut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsDeficienciaVitNut()
    {
        return $this->dsDeficienciaVitNut;
    }

    /**
     * @param mixed $dsDeficienciaVitNut
     * @return identificacao
     */
    public function setDsDeficienciaVitNut($dsDeficienciaVitNut)
    {
        $this->dsDeficienciaVitNut = $dsDeficienciaVitNut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnDesmaioConvulsao()
    {
        return $this->snDesmaioConvulsao;
    }

    /**
     * @param mixed $snDesmaioConvulsao
     * @return identificacao
     */
    public function setSnDesmaioConvulsao($snDesmaioConvulsao)
    {
        $this->snDesmaioConvulsao = $snDesmaioConvulsao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtUltimDesmaioConvulsao()
    {
        return $this->dtUltimDesmaioConvulsao;
    }

    /**
     * @param mixed $dtUltimDesmaioConvulsao
     * @return identificacao
     */
    public function setDtUltimDesmaioConvulsao($dtUltimDesmaioConvulsao)
    {
        $this->dtUltimDesmaioConvulsao = $dtUltimDesmaioConvulsao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnTomaMedicacao()
    {
        return $this->snTomaMedicacao;
    }

    /**
     * @param mixed $snTomaMedicacao
     * @return identificacao
     */
    public function setSnTomaMedicacao($snTomaMedicacao)
    {
        $this->snTomaMedicacao = $snTomaMedicacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsTomaMedicacao()
    {
        return $this->dsTomaMedicacao;
    }

    /**
     * @param mixed $dsTomaMedicacao
     * @return identificacao
     */
    public function setDsTomaMedicacao($dsTomaMedicacao)
    {
        $this->dsTomaMedicacao = $dsTomaMedicacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsPraqueTomaMedicacao()
    {
        return $this->dsPraqueTomaMedicacao;
    }

    /**
     * @param mixed $dsPraqueTomaMedicacao
     * @return identificacao
     */
    public function setDsPraqueTomaMedicacao($dsPraqueTomaMedicacao)
    {
        $this->dsPraqueTomaMedicacao = $dsPraqueTomaMedicacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnAcompMedicTomaMedicacao()
    {
        return $this->snAcompMedicTomaMedicacao;
    }

    /**
     * @param mixed $snAcompMedicTomaMedicacao
     * @return identificacao
     */
    public function setSnAcompMedicTomaMedicacao($snAcompMedicTomaMedicacao)
    {
        $this->snAcompMedicTomaMedicacao = $snAcompMedicTomaMedicacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnDiabetes()
    {
        return $this->snDiabetes;
    }

    /**
     * @param mixed $snDiabetes
     * @return identificacao
     */
    public function setSnDiabetes($snDiabetes)
    {
        $this->snDiabetes = $snDiabetes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnFazTratDiabetes()
    {
        return $this->snFazTratDiabetes;
    }

    /**
     * @param mixed $snFazTratDiabetes
     * @return identificacao
     */
    public function setSnFazTratDiabetes($snFazTratDiabetes)
    {
        $this->snFazTratDiabetes = $snFazTratDiabetes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsFazTratDiabetes()
    {
        return $this->dsFazTratDiabetes;
    }

    /**
     * @param mixed $dsFazTratDiabetes
     * @return identificacao
     */
    public function setDsFazTratDiabetes($dsFazTratDiabetes)
    {
        $this->dsFazTratDiabetes = $dsFazTratDiabetes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnAlgumaCirurgia()
    {
        return $this->snAlgumaCirurgia;
    }

    /**
     * @param mixed $snAlgumaCirurgia
     * @return identificacao
     */
    public function setSnAlgumaCirurgia($snAlgumaCirurgia)
    {
        $this->snAlgumaCirurgia = $snAlgumaCirurgia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnEsteveInternado()
    {
        return $this->snEsteveInternado;
    }

    /**
     * @param mixed $snEsteveInternado
     * @return identificacao
     */
    public function setSnEsteveInternado($snEsteveInternado)
    {
        $this->snEsteveInternado = $snEsteveInternado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsEsteveInternado()
    {
        return $this->dsEsteveInternado;
    }

    /**
     * @param mixed $dsEsteveInternado
     * @return identificacao
     */
    public function setDsEsteveInternado($dsEsteveInternado)
    {
        $this->dsEsteveInternado = $dsEsteveInternado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupoSang()
    {
        return $this->grupoSang;
    }

    /**
     * @param mixed $grupoSang
     * @return identificacao
     */
    public function setGrupoSang($grupoSang)
    {
        $this->grupoSang = $grupoSang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFatorRH()
    {
        return $this->fatorRH;
    }

    /**
     * @param mixed $fatorRH
     * @return identificacao
     */
    public function setFatorRH($fatorRH)
    {
        $this->fatorRH = $fatorRH;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnRecebeuTransfusaoSang()
    {
        return $this->snRecebeuTransfusaoSang;
    }

    /**
     * @param mixed $snRecebeuTransfusaoSang
     * @return identificacao
     */
    public function setSnRecebeuTransfusaoSang($snRecebeuTransfusaoSang)
    {
        $this->snRecebeuTransfusaoSang = $snRecebeuTransfusaoSang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtRecebeuTransfusaoSang()
    {
        return $this->dtRecebeuTransfusaoSang;
    }

    /**
     * @param mixed $dtRecebeuTransfusaoSang
     * @return identificacao
     */
    public function setDtRecebeuTransfusaoSang($dtRecebeuTransfusaoSang)
    {
        $this->dtRecebeuTransfusaoSang = $dtRecebeuTransfusaoSang;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param mixed $observacao
     * @return identificacao
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmResponsavel()
    {
        return $this->nmResponsavel;
    }

    /**
     * @param mixed $nmResponsavel
     * @return identificacao
     */
    public function setNmResponsavel($nmResponsavel)
    {
        $this->nmResponsavel = $nmResponsavel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtAssinatura()
    {
        return $this->dtAssinatura;
    }

    /**
     * @param mixed $dtAssinatura
     * @return identificacao
     */
    public function setDtAssinatura($dtAssinatura)
    {
        $this->dtAssinatura = $dtAssinatura;
        return $this;
    }




}
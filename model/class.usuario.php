<?php

/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/07/17
 * Time: 14:33
 */
class usuario
{
    private $cdUsuario;
    private $dsLogin;
    private $nmUsuario;
    private $dsSenha;
    private $snAtivo;
    private $nivel;
    private $snSenhaAtual;

    /**
     * @return mixed
     */
    public function getCdUsuario()
    {
        return $this->cdUsuario;
    }

    /**
     * @param mixed $cdUsuario
     * @return usuario
     */
    public function setCdUsuario($cdUsuario)
    {
        $this->cdUsuario = $cdUsuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsLogin()
    {
        return $this->dsLogin;
    }

    /**
     * @param mixed $dsLogin
     * @return usuario
     */
    public function setDsLogin($dsLogin)
    {
        $this->dsLogin = $dsLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNmUsuario()
    {
        return $this->nmUsuario;
    }

    /**
     * @param mixed $nmUsuario
     * @return usuario
     */
    public function setNmUsuario($nmUsuario)
    {
        $this->nmUsuario = $nmUsuario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDsSenha()
    {
        return $this->dsSenha;
    }

    /**
     * @param mixed $dsSenha
     * @return usuario
     */
    public function setDsSenha($dsSenha)
    {
        $this->dsSenha = $dsSenha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnAtivo()
    {
        return $this->snAtivo;
    }

    /**
     * @param mixed $snAtivo
     * @return usuario
     */
    public function setSnAtivo($snAtivo)
    {
        $this->snAtivo = $snAtivo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     * @return usuario
     */
    public function setNivel(nivel $nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSnSenhaAtual()
    {
        return $this->snSenhaAtual;
    }

    /**
     * @param mixed $snSenhaAtual
     * @return usuario
     */
    public function setSnSenhaAtual($snSenhaAtual)
    {
        $this->snSenhaAtual = $snSenhaAtual;
        return $this;
    }


}
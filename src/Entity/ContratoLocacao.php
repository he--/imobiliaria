<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ContratoLocacao
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date", name="dt_cadastro", nullable=true)
     */
    private $dtCadastro;

    /**
     * @ORM\Column(type="date", name="dt_validade", nullable=true)
     */
    private $dtValidade;

    /**
     * @ORM\Column(type="date", name="forma_pagamento", nullable=true)
     */
    private $formaPagamento;

    /**
     * @ORM\Column(type="date", name="dt_vencimento", nullable=true)
     */
    private $dtVencimento;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuario", inversedBy="contrato", cascade={"persist"})
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", unique=true, nullable=true)
     */
    private $usuario;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Imovel", inversedBy="imovel", cascade={"persist"})
     * @ORM\JoinColumn(name="id_imovel", referencedColumnName="id", unique=true)
     */
    private $imovel;

    /**
     * @ORM\Column(type="string", length=155, nullable=true)
     */
    private $clausula_contratual;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param mixed $dtCadastro
     */
    public function setDtCadastro($dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }

    /**
     * @return mixed
     */
    public function getDtValidade()
    {
        return $this->dtValidade;
    }

    /**
     * @param mixed $dtValidade
     */
    public function setDtValidade($dtValidade): void
    {
        $this->dtValidade = $dtValidade;
    }

    /**
     * @return mixed
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    /**
     * @param mixed $formaPagamento
     */
    public function setFormaPagamento($formaPagamento): void
    {
        $this->formaPagamento = $formaPagamento;
    }

    /**
     * @return mixed
     */
    public function getDtVencimento()
    {
        return $this->dtVencimento;
    }

    /**
     * @param mixed $dtVencimento
     */
    public function setDtVencimento($dtVencimento): void
    {
        $this->dtVencimento = $dtVencimento;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getImovel()
    {
        return $this->imovel;
    }

    /**
     * @param mixed $imovel
     */
    public function setImovel($imovel): void
    {
        $this->imovel = $imovel;
    }

    /**
     * @return mixed
     */
    public function getClausulaContratual()
    {
        return $this->clausula_contratual;
    }

    /**
     * @param mixed $clausula_contratual
     */
    public function setClausulaContratual($clausula_contratual): void
    {
        $this->clausula_contratual = $clausula_contratual;
    }
}

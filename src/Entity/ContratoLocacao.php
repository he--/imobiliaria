<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Usuario;
use App\Entity\Imovel;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContratoLocacaoRepository")
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
     * @ORM\Column(type="date", name="dt_cadastro", nullable=false)
     */
    private $dtCadastro;

    /**
     * @ORM\Column(type="date", name="dt_validade", nullable=false)
     */
    private $dtValidade;

    /**
     * @ORM\Column(type="string", length=100, name="forma_pagamento", nullable=false)
     */
    private $formaPagamento;

    /**
     * @ORM\Column(type="date", name="dt_vencimento", nullable=false)
     */
    private $dtVencimento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="contratoLocacao", cascade={"persist"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contratoLocacao", cascade={"persist"})
     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", nullable=false)
     */
    private $imovel;

    /**
     * @ORM\Column(type="string", name="clausula_contratual", nullable=false)
     */
    private $clausulaContratual;

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
        return $this->clausulaContratual;
    }

    /**
     * @param mixed $clausulaContratual
     */
    public function setClausulaContratual($clausulaContratual): void
    {
        $this->clausulaContratual = $clausulaContratual;
    }

}

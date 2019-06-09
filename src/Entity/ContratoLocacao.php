<?php


namespace App\Entity;


class ContratoLocacao
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dt_cadastro;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */

    private $dt_validade;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $forma_pagamento;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dt_vencimento;

    /**
     * @ORM\Column(type="integer")
     */
    private $usuario_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $imovel_id;

    /**
     * @ORM\Column(type="string")
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
        return $this->dt_cadastro;
    }

    /**
     * @param mixed $dt_cadastro
     */
    public function setDtCadastro($dt_cadastro): void
    {
        $this->dt_cadastro = $dt_cadastro;
    }

    /**
     * @return mixed
     */
    public function getDtValidade()
    {
        return $this->dt_validade;
    }

    /**
     * @param mixed $dt_validade
     */
    public function setDtValidade($dt_validade): void
    {
        $this->dt_validade = $dt_validade;
    }

    /**
     * @return mixed
     */
    public function getFormaPagamento()
    {
        return $this->forma_pagamento;
    }

    /**
     * @param mixed $forma_pagamento
     */
    public function setFormaPagamento($forma_pagamento): void
    {
        $this->forma_pagamento = $forma_pagamento;
    }

    /**
     * @return mixed
     */
    public function getDtVencimento()
    {
        return $this->dt_vencimento;
    }

    /**
     * @param mixed $dt_vencimento
     */
    public function setDtVencimento($dt_vencimento): void
    {
        $this->dt_vencimento = $dt_vencimento;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */
    public function getImovelId()
    {
        return $this->imovel_id;
    }

    /**
     * @param mixed $imovel_id
     */
    public function setImovelId($imovel_id): void
    {
        $this->imovel_id = $imovel_id;
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
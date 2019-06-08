<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Imovel
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM/Column(type="string", length=15)
     *
     */
    private $status;


    /**
     * @var string
     * @ORM/Column(type="string")
     */
    private $tipoImovel;

    /**
     * @var string
     * @ORM/Column(type="string", length=150)
     *
     */
    private $caracteristicas;

    /**
     * @var string
     * @ORM/Column(type="string", length=150)
     *
     */
    private $observacoes;

    /**
     * @var string
     * @ORM/Column(type="date")
     *
     */
    private $dtCadastro;

    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
     */
    private $endereco;

    /**
     * @ORM\OneToMany(targetEntity="Entity\contratoLocacao", mappedBy="imovel")
     */
    private $contratoLocacao;



    /**
     * @return mixed
     */
    public function getContratoAdm()
    {
        return $this->contratoAdm;
    }

    /**
     * @param mixed $contratoAdm
     */
    public function setContratoAdm($contratoAdm): void
    {
        $this->contratoAdm = $contratoAdm;
    }

    /**
     * @ORM\OneToMany(targetEntity="Entity\ContratoAdm", mappedBy="imovel")
     */

    private $contratoAdm;

    /**
     * @return mixed
     */
    public function getContratoLocacao()
    {
        return $this->contratoLocacao;
    }

    /**
     * @param mixed $contratoLocacao
     */
    public function setContratoLocacao($contratoLocacao): void
    {
        $this->contratoLocacao = $contratoLocacao;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

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
     * @return string
     */
    public function getCaracteristicas(): string
    {
        return $this->caracteristicas;
    }

    /**
     * @param string $caracteristicas
     */
    public function setCaracteristicas(string $caracteristicas): void
    {
        $this->caracteristicas = $caracteristicas;
    }

    /**
     * @return string
     */
    public function getObservacoes(): string
    {
        return $this->observacoes;
    }

    /**
     * @param string $observacoes
     */
    public function setObservacoes(string $observacoes): void
    {
        $this->observacoes = $observacoes;
    }


    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getTipoImovel(): string
    {
        return $this->tipoImovel;
    }

    /**
     * @param string $tipoImovel
     */
    public function setTipoImovel(string $tipoImovel): void
    {
        $this->tipoImovel = $tipoImovel;
    }

    /**
     * @return string
     */
    public function getDtCadastro(): string
    {
        return $this->dtCadastro;
    }

    /**
     * @param string $dtCadastro
     */
    public function setDtCadastro(string $dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }




}
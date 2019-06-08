<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Imovel
 * @package App\Entity
 * @ORM\Entity
 */
class Imovel
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=15)
     */
    private $status;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     */
    private $caracteriscas;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     */
    private $observacao;


    /**
     * @var string
     * @ORM\Column(type="string", name="tipo_imovel")
     */
    private $tipoImovel;

    /**
     * @var DateTimeInterface
     * @ORM\Column(type="datetime")
     */
    private $dt_cadastro;

    /**
     * @var Endereco
     * @ORM\OneToOne(targetEntity="App\Entity\Endereco", inversedBy="imovel", cascade={"persist"})
     * @ORM\JoinColumn(name="id_endereco", referencedColumnName="id", unique=true, nullable=true)
     */
    private $endereco;


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getCaracteriscas(): ?string
    {
        return $this->caracteriscas;
    }

    /**
     * @return string|null
     */
    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDtCadastro(): ?DateTimeInterface
    {
        return $this->dt_cadastro;
    }

    /**
     * @return Endereco|null
     */
    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $caracteriscas
     */
    public function setCaracteriscas(string $caracteriscas): void
    {
        $this->caracteriscas = $caracteriscas;
    }

    /**
     * @param string $observacao
     */
    public function setObservacao(string $observacao): void
    {
        $this->observacao = $observacao;
    }

    /**
     * @param string $tipoImovel
     */
    public function setTipoImovel(string $tipoImovel): void
    {
        $this->tipoImovel = $tipoImovel;
    }

    /**
     * @param DateTimeInterface $dt_cadastro
     */
    public function setDtCadastro(DateTimeInterface $dt_cadastro): void
    {
        $this->dt_cadastro = $dt_cadastro;
    }

    /**
     * @param Endereco $endereco
     */
    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }


}

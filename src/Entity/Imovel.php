<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $status;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $caracteristicas;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $observacao;

    /**
     * @ORM\Column(type="date", name="dt_cadastro", nullable=true)
     */
    private $dtCadastro;

//    /**
//     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
//     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
//     */
//    private $endereco;

    /**
     * @var string
     * @ORM\Column(type="string", length=25, name="tipo_imovel", nullable=true)
     */
    private $tipoImovel;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
    public function getObservacao(): string
    {
        return $this->observacao;
    }

    /**
     * @param string $observacao
     */
    public function setObservacao(string $observacao): void
    {
        $this->observacao = $observacao;
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

//    /**
//     * @return mixed
//     */
//    public function getEndereco()
//    {
//        return $this->endereco;
//    }
//
//    /**
//     * @param mixed $endereco
//     */
//    public function setEndereco($endereco): void
//    {
//        $this->endereco = $endereco;
//    }

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

}
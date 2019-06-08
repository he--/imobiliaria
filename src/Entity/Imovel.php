<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class Imovel
 * @ORM\Entity
 * @package Entity
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
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $status;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $caracteristicas;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $observacao;

    /**
     * @var date
     * @ORM\Column(type="date", nullable=false)
     */
    private $dt_cadastro;

    // /**
    //  * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
    //  * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
    //  */
    // private $endereco;

    /**
     * @return string
     */
    private $tipo_imovel;

    public function getId()
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    public function getCaracteristica(): string
    {
        return $this->caracteristica;
    }

    public function setCaracteristica(string $caracteristica)
    {
        $this->caracteristica = $caracteristica;
    }

    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao)
    {
        $this->observacao = $observacao;
    }

    public function getDataCadastro(): Date
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro(Date $dt_cadastro)
    {
        $this->dt_cadastro = $dt_cadastro;
    }

    public function getEndereco(): integer
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }
}
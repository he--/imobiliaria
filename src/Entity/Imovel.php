<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Imovel
 * @ORM\Entity
 * @package App\Entity
 *
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
     * @var date
     * @ORM\Column(type="date",nullable=true)
     */
    private $dtCadastro;
    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
     */
    private $endereco;

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
     * @return date
     */
    public function getDtCadastro(): date
    {
        return $this->dtCadastro;
    }

    /**
     * @param date $dtCadastro
     */
    public function setDtCadastro(date $dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
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


}
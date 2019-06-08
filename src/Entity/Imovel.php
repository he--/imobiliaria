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
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $caracteristicas;

    /**
     * @ORM\Column(type="string", length=150, nullable=false)
     */
    private $observacao;

    /**
     * @ORM\Column(type="datetime", name="dt_cadastro", nullable=false)
     */
    private $data_cadastro;

//    /**
//     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
//     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
//     */
//    private $endereco;

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
     * @return mixed
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    /**
     * @param mixed $caracteristicas
     */
    public function setCaracteristicas($caracteristicas): void
    {
        $this->caracteristicas = $caracteristicas;
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
     */
    public function setObservacao($observacao): void
    {
        $this->observacao = $observacao;
    }

    /**
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param mixed $data_cadastro
     */
    public function setDataCadastro($data_cadastro): void
    {
        $this->data_cadastro = $data_cadastro;
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

}
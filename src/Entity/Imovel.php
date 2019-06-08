<?php


namespace App\Entity;


/**
 * Class Imovel
 * @ORM/Entity
 * @package App\Entity
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
     * @ORM\Column(type="string",length=15, nullable=true)
     */
    private $status;

    /**
     * @var string
     * @ORM\Column(type="string",length=150, nullable=true)
     */
    private $caracteristicas;

    /**
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
     private $observacao;


     /**
      * @var datetime
      * @ORM\Column(type="datetime", name="dt_cadastro",nullable=true)
      */
     private $cadastro;


     /**
      * @var string
      * @ORM|Column(type="string", length=15, name="tipo_imovel", nullable=true)
      */
     private $tipoimovel;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Endereco", inversedBy="cliente", cascade={"persist"})
     * @ORM\JoinColumn(name="id_endereco", referencedColumnName="id", unique=true, nullable=true)
     */
     private $endereco_id;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }/**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }/**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }/**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }/**
     * @return string
     */
    public function getCaracteristicas(): string
    {
        return $this->caracteristicas;
    }/**
     * @param string $caracteristicas
     */
    public function setCaracteristicas(string $caracteristicas): void
    {
        $this->caracteristicas = $caracteristicas;
    }/**
     * @return string
     */
    public function getObservacao(): string
    {
        return $this->observacao;
    }/**
     * @param string $observacao
     */
    public function setObservacao(string $observacao): void
    {
        $this->observacao = $observacao;
    }/**
     * @return datetime
     */
    public function getCadastro(): datetime
    {
        return $this->cadastro;
    }/**
     * @param datetime $cadastro
     */
    public function setCadastro(datetime $cadastro): void
    {
        $this->cadastro = $cadastro;
    }/**
     * @return mixed
     */
    public function getEnderecoId()
    {
        return $this->endereco_id;
    }/**
     * @param mixed $endereco_id
     */
    public function setEnderecoId($endereco_id): void
    {
        $this->endereco_id = $endereco_id;
    }




}
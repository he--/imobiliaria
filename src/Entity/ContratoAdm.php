<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ContratoAdm
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dtCadastro;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $clausulaContratual;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="contratosAdm")
     * @ORM\JoinColumn(name="usuario_id", nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contratosAdm")
     * @ORM\JoinColumn(name="imovel_id", nullable=false)
     */
    private $imovel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDtCadastro(): ?\DateTimeInterface
    {
        return $this->dtCadastro;
    }

    public function setDtCadastro(\DateTimeInterface $dtCadastro): self
    {
        $this->dtCadastro = $dtCadastro;

        return $this;
    }

    public function getClausulaContratual(): ?string
    {
        return $this->clausulaContratual;
    }

    public function setClausulaContratual(?string $clausulaContratual): self
    {
        $this->clausulaContratual = $clausulaContratual;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getImovel(): ?Imovel
    {
        return $this->imovel;
    }

    public function setImovel(?Imovel $imovel): self
    {
        $this->imovel = $imovel;

        return $this;
    }
}

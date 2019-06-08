<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Imovel
 * @ORM\Entity
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
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dt_cadastro;

    /**
     * @ORM\Column(type="string", name="tipo_imovel", nullable=false)
     */
    private $tipoimovel;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
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
    public function getTipoimovel()
    {
        return $this->tipoimovel;
    }

    /**
     * @param mixed $tipoimovel
     */
    public function setTipoimovel($tipoimovel): void
    {
        $this->tipoimovel = $tipoimovel;
    }


}
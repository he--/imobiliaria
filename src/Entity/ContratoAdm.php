<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ContratoAdm
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date", name="dt_cadastro", nullable=true)
     */
    private $dtCadastro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="contratoAdm")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", unique=true, nullable=true)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contratoAdm")
     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", unique=true, nullable=true)
     */
    private $imovel;

    /**
     * @ORM\Column(type="string", nullable=true)
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
        return $this->dtCadastro;
    }

    /**
     * @param mixed $dtCadastro
     */
    public function setDtCadastro($dtCadastro): void
    {
        $this->dtCadastro = $dtCadastro;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getImovel()
    {
        return $this->imovel;
    }

    /**
     * @param mixed $imovel
     */
    public function setImovel($imovel): void
    {
        $this->imovel = $imovel;
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
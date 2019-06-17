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
     * @ORM\OneToOne(targetEntity="App\Entity\Usuario", inversedBy="contrato", cascade={"persist"})
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id", unique=true, nullable=true)
     */
    private $usuario;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Imovel", inversedBy="imovel", cascade={"persist"})
     * @ORM\JoinColumn(name="id_imovel", referencedColumnName="id", unique=true)
     */
    private $imovel;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $clausulaContratual;
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
    public function setId($id)
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
    public function setDtCadastro($dtCadastro)
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
    public function setUsuario($usuario)
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
    public function setImovel($imovel)
    {
        $this->imovel = $imovel;
    }
    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getClausulaContratual()
    {
        return $this->clausulaContratual;
    }
    /**
     * @param mixed $clausulaContratual
     */
    public function setClausulaContratual($clausulaContratual)
    {
        $this->clausulaContratual = $clausulaContratual;
    }
}
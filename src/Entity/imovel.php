<?php
namespace Entity;

/**
 * Class Imovel
 * @ORM\Entity
 * @package App\Entity
 */
class imovel
{   
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
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
    private $caracteristicas;

    /**
     * @var string
     * @ORM\Column(type="string", length=150) 
     */
    private $observacao;

    /**
     * @var string
     * @ORM\Column(type="date", nullable="true) 
     */
    private $dt_cadastro;

    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
     */
    private $endereco_id;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function getEnderecoId()
    {
        return $this->endereco_id;
    }

    /**
     * @param mixed $endereco_id
     */
    public function setEnderecoId($endereco_id): void
    {
        $this->endereco_id = $endereco_id;
    }
}
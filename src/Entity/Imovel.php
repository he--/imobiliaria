<?php


namespace App\Entity;


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
     * @ORM\Column(type="string", length=15)
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $dt_cadastro;

    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="cliente")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", unique=true)
     */
    private $endereco;

    /**
     * @var string
     * @ORM\Column(type="string", name="tipo_imovel")
     */
    private $tipo_imovel;

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
        return $this->dt_cadastro;
    }

    /**
     * @param date $dt_cadastro
     */
    public function setDtCadastro(date $dt_cadastro): void
    {
        $this->dt_cadastro = $dt_cadastro;
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

    /**
     * @return string
     */
    public function getTipo_imovel(): string
    {
        return $this->tipo_imovel;
    }

    /**
     * @param string $tipo_imovel
     */
    public function setTipo_imovel(string $tipo_imovel): void
    {
        $this->tipo_imovel = $tipo_imovel;
    }
}
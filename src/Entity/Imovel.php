<?php


namespace App\Entity;


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
     * @var string
     * @ORM(type="string", length = 15, nullable=false)
     */
    private $status;

    /**
     * @var string
     * @ORM(type="string", length = 150, nullable=false)
     */
    private $caracteristicas;

    /**
     * @var string
     * @ORM(type="string", length = 150, nullable=false)
     */
    private $observacao;

    /**
     * @var date
     * @ORM(type="date", nullable=false)
     */
    private $dt_cadastro;

    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
     * @ORM\JoinColumn(name="endereco_id",referencedColumnName="id", unique=true)
     */
    private $endereco_id;

    /**
     *@return string
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

    /**
     * @return mixed
     */
    public function getTipoImovel()
    {
        return $this->tipo_imovel;
    }

    /**
     * @param mixed $tipo_imovel
     */
    public function setTipoImovel($tipo_imovel): void
    {
        $this->tipo_imovel = $tipo_imovel;
    }



}
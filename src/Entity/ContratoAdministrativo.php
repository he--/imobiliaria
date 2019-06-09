<?php


namespace App\Entity;


class ContratoAdministrativo
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dt_cadastro;

    /**
     * @ORM\Column(type="integer")
     */
    private $usuario_id;

    /**
     * @ORM\Column(type="Integer")
     */
    private $imovel_id;

    /**
     * @ORM\Column(type="string")
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
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */
    public function getImovelId()
    {
        return $this->imovel_id;
    }

    /**
     * @param mixed $imovel_id
     */
    public function setImovelId($imovel_id): void
    {
        $this->imovel_id = $imovel_id;
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
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
     * @ORM\Column(type="date")
     */

    private $dt_cadastro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="contrato", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", unique=true)
     */
    private $usuario_id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contrato", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", unique=true)
     */
    private $imovel_id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $clausula_contratual;

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
 * @return mixed
 */
public function getDtCadastro()
{
    return $this->dt_cadastro;
}/**
 * @param mixed $dt_cadastro
 */
public function setDtCadastro($dt_cadastro): void
{
    $this->dt_cadastro = $dt_cadastro;
}/**
 * @return mixed
 */
public function getUsuarioId()
{
    return $this->usuario_id;
}/**
 * @param mixed $usuario_id
 */
public function setUsuarioId($usuario_id): void
{
    $this->usuario_id = $usuario_id;
}/**
 * @return mixed
 */
public function getImovelId()
{
    return $this->imovel_id;
}/**
 * @param mixed $imovel_id
 */
public function setImovelId($imovel_id): void
{
    $this->imovel_id = $imovel_id;
}/**
 * @return mixed
 */
public function getClausulaContratual()
{
    return $this->clausula_contratual;
}/**
 * @param mixed $clausula_contratual
 */
public function setClausulaContratual($clausula_contratual): void
{
    $this->clausula_contratual = $clausula_contratual;
}
}
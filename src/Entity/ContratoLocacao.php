<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ContratoLocacao
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**     
     * @ORM\Column(type="integer")     
     */
    private $ativo;
    
    public function setAtivo($status){
        $this->ativo = $status;
    }
    public function isAtivo(){
        return $this->ativo;
    }

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime",name="dt_locacao", nullable=true)
     */
    private $dtLocacao;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")     
     */
    private $duracaoEmMeses;

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
    public function getDtLocacao()
    {
        return $this->dtLocacao;
    }
    /**
     * @param mixed $dtLocacao
     */
    public function setDtLocacao($dtLocacao): void
    {
        $this->dtLocacao = $dtLocacao;
    }

/**
     * @return mixed
     */
    public function getDuracaoEmMeses()
    {
        return $this->duracaoEmMeses;
    }

    /**
     * @param mixed $duracaoEmMeses
     */
    public function setDuracaoEmMeses($duracaoEmMeses): void
    {
        $this->duracaoEmMeses = $duracaoEmMeses;
    }

     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contratoLocacao")     
     */
    private $imovel;

    public function setImovel($imovel){
        $this->imovel = $imovel;
    }

    public function getImovel(){
        return $this->imovel;
    }


   
}
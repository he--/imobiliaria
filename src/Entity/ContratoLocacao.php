<?php


namespace App\Entity;

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
     * @ORM\Column(type="date")
     */

    private $dt_cadastro;


    /**
     * @ORM\Column(type="date")
     */

    private $dt_validade;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $forma_pagamento;


    /**
     * @ORM\Column(type="integer")
     */

    private $dt_vencimento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="contrato_adm", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", unique=true)
     */
    private $usuario_id;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Imovel", inversedBy="contrato_adm", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", unique=true)
     */
    private $imovel_id;

}
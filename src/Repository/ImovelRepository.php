<?php

namespace App\Repository;

use App\Entity\Imovel;
use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ImovelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imovel::class);
    }

    /**
     * @return EntityManager
     */
    public function salvar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush();
    }

    /**
     * @return EntityManager
     */
    public function editar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->merge($imovel);
        $em->flush();
    }

    /**
     * @return EntityManager
     */
    public function deletar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->remove($imovel);
        $em->flush();
    }
}
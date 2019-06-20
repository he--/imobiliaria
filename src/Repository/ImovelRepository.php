<?php

namespace App\Repository;

use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ImovelRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imovel::class);
    }


    /**
     * @param Imovel $imovel
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */

    public function salvar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush();

    }

    /**
     * @param Int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar(int $id)
    {
        $em = $this->getEntityManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);
        $em->remove($imovel);
        $em->flush();
    }

    public function listar()
    {
        $em = $this->getEntityManager();
        return $em->getRepository(Imovel::class)->findAll();
    }

    public function editar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->merge($imovel);
        $em->flush();
    }

}
<?php

namespace App\Repository;

use App\Entity\Imovel;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class ImovelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Imovel::class);
    }

    public function salvar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush();
    }

    public function remover(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->remove($imovel);
        $em->flush();
    }

    public function editar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->merge($imovel);
        $em->flush();
    }

    public function listarTodos()
    {
        $em = $this->getEntityManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();
        return $imoveis;
    }

    public function findById($id)
    {
        $em = $this->getEntityManager();
        $imovel = $em->find(Imovel::class, $id);
        return $imovel;
    }

}
<?php


namespace App\Repository;

use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ImovelRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry,  Imovel::class);
    }

    /**
     * @return EntityManager
     */

    public function salvar (Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush();
    }

}

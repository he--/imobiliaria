<?php
/**
 * Created by PhpStorm.
 * User: Rikson
 * Date: 18/06/2019
 * Time: 06:07
 */

namespace App\Repository;

use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ImovelRepository extends ServiceEntityRepository
{
    /**
     * ImovelRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct( $registry, Imovel::class);

    }

    /**
     * @param Imovel $imovel
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function salvarImovel(Imovel $imovel){
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush($imovel);
    }

    /**
     * @param int $id
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

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function editar($id)
    {
        $em = $this->getEntityManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);
        $em->merge($imovel);
        $em->flush();
    }

}




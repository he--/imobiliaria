<?php


namespace App\Repository;


use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ImovelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
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
     * @param Imovel $imovel
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function atualizar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->merge($imovel);
        $em->flush();
    }

    /**
     * @param int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remover(int $id)
    {
        $em = $this->getEntityManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);
        $em->remove($imovel);
        $em->flush();
    }

}
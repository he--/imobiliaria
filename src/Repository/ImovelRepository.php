<?php


namespace App\Repository;


use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ImovelRepository extends ServiceEntityRepository
{
    /**
     * ImovelRepository constructor.
     * @param RegistryInterface $registry
     */
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

}
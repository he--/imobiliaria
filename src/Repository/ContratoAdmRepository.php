<?php

namespace App\Repository;

use App\Entity\ContratoAdm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContratoAdm|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratoAdm|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratoAdm[]    findAll()
 * @method ContratoAdm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratoAdmRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContratoAdm::class);
    }

    // /**
    //  * @return ContratoAdm[] Returns an array of ContratoAdm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContratoAdm
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    /**
     * @param ContratoAdm $contratoAdm
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */

    public function salvar(ContratoAdm $contratoAdm)
    {
        $em = $this->getEntityManager();
        $em->persist($contratoAdm);
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
        $contratoAdm = $em->getRepository(ContratoAdm::class)->find($id);
        $em->remove($contratoAdm);
        $em->flush();
    }

    public function listar()
    {
        $em = $this->getEntityManager();
        return $em->getRepository(ContratoAdm::class)->findAll();
    }

    public function editar(ContratoAdm $contratoAdm)
    {
        $em = $this->getEntityManager();
        $em->merge($contratoAdm);
        $em->flush();
    }

}

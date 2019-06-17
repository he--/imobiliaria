<?php


namespace App\Repository;


use App\Entity\Imovel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
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
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function salvar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->persist($imovel);
        $em->flush();
    }

    /**
     * @param Imovel $imovel
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function editar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->merge($imovel);
        $em->flush();
    }

    /**
     * @param Imovel $imovel
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deletar(Imovel $imovel)
    {
        $em = $this->getEntityManager();
        $em->remove($imovel);
        $em->flush();
    }

    /**
     * @param int $id
     * @return Imovel
     */
    public function findById($id)
    {
        $em = $this->getEntityManager();
        return $em->getRepository(Imovel::class)->find($id);
    }

    /**
     * @return array Imovel
     */
    public function findAll()
    {
        $em = $this->getEntityManager();
        return $em->getRepository(Imovel::class)->findAll();
    }
}
<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UsuarioRepository extends ServiceEntityRepository
{
    /**
     * UsuarioRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usuario::class);
    }
    /**
     * @param Usuario $usuario
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function salvar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->persist($usuario);
        $em->flush();
    }

    /**
     * @param Usuario $usuario
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function editar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->merge($usuario);
        $em->flush();
    }

    /**
     * @param Usuario $usuario
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->remove($usuario);
        $em->flush();
    }

    /**
     * @param int $id
     * @return Usuario
     */
    public function findById($id)
    {
        $em = $this->getEntityManager();
        return $em->getRepository(Usuario::class)->find($id);
    }

    /**
     * @return array Usuario
     */
    public function findAll()
    {
        $em = $this->getEntityManager();
        return $em->getRepository(Usuario::class)->findAll();
    }
}
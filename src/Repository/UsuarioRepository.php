<?php


namespace App\Repository;


use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UsuarioRepository extends ServiceEntityRepository
{

    public  function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    /**
     * @return EntityManager
     */

    public function salvar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->persist($usuario);
        $em->flush();
    }

    public function editar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->merge($usuario);
        $em->flush();

    }

    public function deletar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->remove($usuario);
        $em->flush();
    }
}
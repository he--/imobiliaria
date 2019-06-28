<?php


namespace App\Repository;

use App\Entity\Usuario;
use App\Forms\UsuarioType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use http\Env\Request;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UsuarioRepository extends ServiceEntityRepository
{
    /**
     * UsuarioRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct( $registry, Usuario::class);

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
     * @param int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar(int $id){
        $em = $this->getEntityManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);
        $em->remove($usuario);
        $em->flush();
        return $this->redirectRoute('index');
    }

    /**
     * @param Request $request
     * @param Usuario $usuarioService
     * @return mixed
     */
    public function editar(Usuario $usuarioService){
        $em = $this->getEntityManager();
        $em->merge($usuarioService);
        $em->flush();
    }
}




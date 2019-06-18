<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function salvar(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->persist($usuario);
        $em->flush();
    }

    public function listarTodos()
    {
        $em = $this->getEntityManager();
        $usuarios = $em->getRepository(Usuario::class)->findAll();
        return $usuarios;
    }

    public function findById($id)
    {
        $em = $this->getEntityManager();
        $usuario = $em->find(Usuario::class, $id);
        return $usuario;
    }

    public function editarUsuario(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->merge($usuario);
        $em->flush();
    }

    public function removerUsuario(Usuario $usuario)
    {
        $em = $this->getEntityManager();
        $em->remove($usuario);
        $em->flush();
    }
}
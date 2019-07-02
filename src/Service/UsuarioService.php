<?php

namespace App\Service;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;


class UsuarioService
{
    /**
     * @var UsuarioRepository
     */
    private $usuarioRepository;

    /**
     * UsuarioService constructor.
     * @param UsuarioRepository $usuarioRepository
     */
    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @param Usuario $usuario
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    /**
     * @param int $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function deletar(int $id)
    {
        $this->usuarioRepository->deletar(id);
    }

    /**
     * @param int $id
     */
    public function editar(int $id){
        $this->usuarioRepository->editar($id);

    }
}

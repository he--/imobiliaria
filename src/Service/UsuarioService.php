<?php

namespace App\Service;

use App\Exception\ServiceException;
use App\Repository\UsuarioRepository;
use App\Entity\Usuario;

class UsuarioService
{
    /**
     * @var UsuarioRepository
     */
    private $usuarioRepository;
    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function findById($id)
    {
        $usuario = $this->usuarioRepository->findById($id);
        if ($usuario == null)
        {
            throw new ServiceException("Usuário não encontrado!");
        }
        return $usuario;
    }

    public function findAll()
    {
        return $this->usuarioRepository->findAll();
    }

    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    public function editar($id, Usuario $usuario)
    {
        $usuarioBD = $this->usuarioRepository->findById($id);
        if ($usuarioBD == null)
        {
            throw new ServiceException("Usuário não encontrado!");
        }

        if ($usuario->getId() != $usuarioBD->getId())
        {
            throw new ServiceException("O usuário editado não possui o id fornecido");
        }

        $this->usuarioRepository->editar($usuario);

    }

    public function deletar($id)
    {
        $usuario = $this->usuarioRepository->findById($id);
        if ($usuario == null)
        {
            throw new ServiceException("Usuário não encontrado!");
        }

        $this->usuarioRepository->deletar($usuario);
    }
}
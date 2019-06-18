<?php

namespace App\Service;

use App\Repository\UsuarioRepository;
use App\Entity\Usuario;


class UsuarioService
{

    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    public function listarUsuarios()
    {
        $usuarios = $this->usuarioRepository->listarTodos();
        return $usuarios;
    }

    public function findById($id)
    {
        $usuario = $this->usuarioRepository->findById($id);
        return $usuario;
    }

    public function editarUsuario(Usuario $usuario)
    {
        $this->usuarioRepository->editarUsuario($usuario);
    }

    public function removerUsuario(Usuario $usuario)
    {
        $this->usuarioRepository->removerUsuario($usuario);
    }

}
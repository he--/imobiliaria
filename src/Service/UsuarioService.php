<?php

namespace App\Service;

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

    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    public function editar(Usuario $usuario)
    {
        $this->usuarioRepository->editar($usuario);
    }

    public function deletar(Usuario $usuario)
    {
        $this->usuarioRepository->deletar($usuario);
    }
}
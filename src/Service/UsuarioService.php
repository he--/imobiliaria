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
}
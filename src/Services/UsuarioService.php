<?php

namespace App\Services;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;

class UsuarioService
{

    /**
     * @var UsuarioRepository
     */
    private $usuarioRepository;

    public function __construct(UsuarioRepository $userRepository)
    {
        $this->usuarioRepository = $userRepository;
    }

    public function salvar(Usuario $user)
    {
        $this->usuarioRepository->salvar($user);
    }

}
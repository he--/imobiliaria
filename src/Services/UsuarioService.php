<?php

namespace App\Services;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;

/**
 * Class UsuarioService
 * @package App\Service
 */
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

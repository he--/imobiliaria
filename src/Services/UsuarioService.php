<?php

namespace App\Services;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use phpDocumentor\Reflection\Types\Integer;

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

    public function deletar(int $id)
    {
        $this->usuarioRepository->deletar($id);
    }

    public function listar()
    {
        return $this->usuarioRepository->findAll();
    }

    public function buscarPorId(int $id)
    {
        return $this->usuarioRepository->find($id);
    }
}

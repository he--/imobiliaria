<?php


namespace App\Service;


use App\Entity\Usuario;
use App\Repository\UsuarioRepository;

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

    public function atualizar(Usuario $usuario)
    {
        $this->usuarioRepository->atualizar($usuario);
    }

    public function remover(int $id)
    {
        $this->usuarioRepository->remover($id);
    }

}
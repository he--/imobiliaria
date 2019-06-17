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

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    public function editar (Usuario $imovel)
    {
        $this->usuarioRepository->editar($imovel);
    }

    public function deletar (Usuario $imovel)
    {
        $this->usuarioRepository->deletar($imovel);
    }




}
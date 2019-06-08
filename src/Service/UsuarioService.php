<?php


namespace App\Service;


use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UsuarioService
{
    /**
     * @var UsuarioRepository
     */

    private $usuarioRepository;

    public function _construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }
}
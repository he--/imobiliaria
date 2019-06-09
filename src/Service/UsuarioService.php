<?php


namespace App\Service;


use App\Entity\Usuario;
use App\Forms\UsuarioType;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @param int $id
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deletar(int $id)
    {
        $this->usuarioRepository->deletar($id);
    }

}

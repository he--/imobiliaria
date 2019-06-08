<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Service\UsuarioService;
use App\Forms\UsuarioType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UsuarioController
 * @package App\Controller
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario_novo")
     * @param Request request
     */
    public function cadastroUsuario(Request $request, UsuarioService $usuarioService)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        $usuarioService = $this->get(UsuarioService::class);

        if($form->isSubmitted()) {
            $usuario = $form->getData();
            
        }
    }

}
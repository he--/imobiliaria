<?php


namespace App\Controller;

use App\Exception\ServiceException;
use App\Forms\UsuarioType;
use App\Entity\Usuario;
use App\Service\UsuarioService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
     * @param Request $request
     * @param UsuarioService $usuarioService
     * @return RedirectResponse|Response
     */
    public function cadastroUsuario(Request $request, UsuarioService $usuarioService)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioService->salvar($usuario);

            return $this->redirectToRoute('index');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listar", name="listar_usuarios")
     * @param Request $request
     * @param UsuarioService $service
     * @return Response
     */
    public function listarUsuarios(Request $request, UsuarioService $service)
    {
        $usuarios = $service->findAll();

        return $this->render('listar_usuarios.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/editar/{id}", name="editar_usuario")
     * @param int $id
     * @param Request $request
     * @param UsuarioService $service
     * @return RedirectResponse|Response
     * @throws ServiceException
     */
    public function editarUsuario(int $id, Request $request, UsuarioService $service)
    {
        $usuario = $service->findById($id);
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $service->editar($id, $form->getData());
            return $this->redirectToRoute('listar_usuarios');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deletar/{id}", name="deletar_usuario")
     * @param int $id
     * @param Request $request
     * @param UsuarioService $service
     * @return RedirectResponse
     */
    public function deletarUsuario(int $id, Request $request, UsuarioService $service)
    {
        try
        {
            $service->deletar($id);
            $this->addFlash('success', 'Usuario de id:'.$id.' deletado com sucesso!!!');
        }
        catch (ServiceException $ex)
        {
            $this->addFlash('error', $ex->getMessage());
        }
        return $this->redirectToRoute('listar_usuarios');
    }
}

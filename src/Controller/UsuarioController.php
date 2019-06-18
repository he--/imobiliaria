<?php


namespace App\Controller;

use App\Entity\Corretor;
use App\Forms\UsuarioType;
use App\Entity\Usuario;
use App\Service\UsuarioService;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     */
    public function cadastroUsuario(Request $request, UsuarioService $usuarioService)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioService->salvar($usuario);
            return $this->redirectToRoute('listar_usuarios');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listar", name="listar_usuarios")
     */
    public function listarUsuarios(UsuarioService $usuarioService)
    {
//        $user = new Corretor();
//        $user->setLogin('helio');
//        $user->setRoles([true ? 'ROLE_ADMIN' : 'ROLE_USER']);
//
//        $user->setPassword('ZkCCqGmNQXOeL1avsq2OWv2BSKLqHE33c2aolQ1nFxg');
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($user);
//        $em->flush();

        $usuarios = $usuarioService->listarUsuarios();

        return $this->render('listar_usuarios.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/editar/{id}", name="editar_usuario")
     */
    public function editarUsuario(int $id, Request $request, UsuarioService $usuarioService)
    {
        $usuario = $usuarioService->findById($id);

        if (!$usuario) {
            throw new \Exception('Usuario não encontrado');
        }

        $form = $this->createForm(UsuarioType::class, $usuario);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioService->editarUsuario($usuario);
            return $this->redirectToRoute('listar_usuarios');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deletar/{id}", name="deletar_usuario")
     */
    public function deletarUsuario(int $id, Request $request, UsuarioService $usuarioService)
    {
        $usuario = $usuarioService->findById($id);
        $usuarioService->removerUsuario($usuario);
        $this->addFlash('success', 'Usuario de id:'.$id.' removido com sucesso!!!');
        return $this->redirectToRoute('listar_usuarios');
    }
}

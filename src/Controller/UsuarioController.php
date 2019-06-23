<?php


namespace App\Controller;

use App\Entity\Corretor;
use App\Forms\UsuarioType;
use App\Entity\Usuario;
use App\Service\ImovService;
use App\Service\UsuarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Class UsuarioController
 * @package App\Controller
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario/usuario", name="usuario_novo")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cadastroUsuario(Request $request, UsuarioService $usuarioService)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioService->salvar($usuario);
        }
        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listarUsuario", name="listarUsuario")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function listarUsuario(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository(Usuario::class)->findAll();

        return $this->render('listar_usuarios.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/editarUsuario/{id}", name="editarUsuario")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editar(int $id, Request $request, UsuarioService $usuarioService )
    {
        $usuarioService->editar($id);
        $this->addFlash('success','Usuario de id '.$id.' Excluído com sucesso');
        return $this->redirectToRoute('listarUsuario');
    }

    /**
     * @Route("/deletarUsuario/{id}", name="deletarUsuario")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deletarUsuario(int $id, Request $request, UsuarioService $usuarioService )
    {
        $usuarioService->deletar($id);
        $this->addFlash('success','Usuario de id '.$id.' Excluído com sucesso');
        return $this->redirectToRoute('listarUsuario');
    }
}





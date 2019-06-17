<?php


namespace App\Controller;

use App\Entity\Corretor;
use App\Forms\UsuarioType;
use App\Entity\Usuario;
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

     * @Route("/usuario", name="usuario_novo")
     */
    public function cadastroUsuario(Request $request, UsuarioService $usuarioService)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $usuario = $form->getData();
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($usuario);
//            $em->flush();

            $usuarioService->salvar($usuario);

            return $this->redirectToRoute('index');
        }
        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listar", name="listar_usuarios")
     */
    public function listarUsuarios(Request $request)
    {
        $user = new Corretor();
        $user->setLogin('helio');
        $user->setRoles([true ? 'ROLE_ADMIN' : 'ROLE_USER']);

        $user->setPassword('ZkCCqGmNQXOeL1avsq2OWv2BSKLqHE33c2aolQ1nFxg');
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
     * @Route("/editar/{id}", name="editar_usuario")
     */
    public function editarUsuario(int $id, Request $request, UsuarioService $usuarioService)
    {
        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)->find($id);
        //$usuario = $em->getRepository(Usuario::class)->find($id);

        if (!$usuario) {
            throw new \Exception('Usuario não encontrado');
        }

        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioService->editar($usuario);
            //$em = $this->getDoctrine()->getManager();
            //$em->merge($usuario);
            //$em->flush();

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
        $usuario = $this->getDoctrine()->getManager()->getRepository(Usuario::class)->find($id);

        $usuarioService->deletar($usuario);
        //$em->remove($usuario);
        //$em->flush();
        $this->addFlash('success', 'Usuario de id:'.$id.' deletado com sucesso!!!');

        return $this->redirectToRoute('listar_usuarios');
    }
}

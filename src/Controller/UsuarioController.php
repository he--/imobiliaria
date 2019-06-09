<?php


namespace App\Controller;

use App\Entity\Corretor;
use App\Entity\Usuario;
use App\Forms\UsuarioType;
use App\Service\UsuarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UsuarioController
 * @package App\Controller
 */
class UsuarioController extends AbstractController
{

    /**
     * @Route("/usuario/cadastro", name="cadastro_usuario")
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
     * @Route("/usuario/listar", name="listar_usuarios")
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
     * @Route("/usuario/editar/{id}", name="editar_usuario")
     */
    public function editarUsuario(int $id, Request $request, UsuarioService $usuarioService)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);

        if (!$usuario) {
            throw new \Exception('Usuario não encontrado');
        }

        $form = $this->createForm(UsuarioType::class, $usuario);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            try{
                $usuario = $form->getData();
                $usuarioService->salvar($usuario);

                $this->addFlash('success', 'Usuario '.$usuario->getNome().' alterado com sucesso!!!');
            }catch (\Exception $e){
                $this->addFlash('error', 'Erro ao tentar alterar o usuário: '.$e->getMessage());
            }
            return $this->redirectToRoute('listar_usuarios');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/usuario/deletar/{id}", name="deletar_usuario")
     */
    public function deletarUsuario(int $id, Request $request, UsuarioService $usuarioService)
    {
        $usuarioService->deletar($id);
        $this->addFlash('success', 'Usuario de id:'.$id.' deletado com sucesso!!!');

        return $this->redirectToRoute('listar_usuarios');
    }
}

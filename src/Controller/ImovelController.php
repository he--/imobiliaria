<?php

namespace App\Controller;

use App\Entity\Corretor;
use App\Entity\Imovel;
use App\Forms\ImovelType;
use App\Service\ImovelService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ImovelController
 * @package App\Controller
 */
class ImovelController extends AbstractController
{
    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request $request
     */
    public function cadastroImovel(Request $request, ImovelService $imovelService)
    {

       $imovel = new Imovel();
       $form = $this->createForm(ImovelType::class, $imovel);
       $form->handleRequest($request);
       if ($form->isSubmitted()) {
            $imovel = $form->getData();
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($imovel);
//            $em->flush();

            $imovelService->salvar($imovel);

            return $this->redirectToRoute('index');
       }

       return $this->render('imovel_cadastro.html.twig' , [
                'form'=>$form->createview()
            ]
       );

    }

    /**
     * @Route("/imovel/listar", name="listar_imoveis")
     */

    public function listarImoveis(Request $request)
    {
        $user = new Corretor();
        $user->setLogin('helio');
        $user->setRoles([true ? 'ROLE_ADMIN' : 'ROLE_USER']);

        $user->setPassword('ZkCCqGmNQXOeL1avsq2OWv2BSKLqHE33c2aolQ1nFxg');
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();



        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();

        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/editar/{id}", name="editar_imovel")
     */
    public function editarImovel(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        if (!$imovel) {
            throw new \Exception('Imovel não encontrado');
        }

        $form = $this->createForm(ImovelType::class, $imovel);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->merge($imovel);
            $em->flush();

            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deletar/{id}", name="deletar_imovel")
     */
    public function deletarImovel(int $id, Request $request)
    {
//        $imovel = new Imovel();
//        $imovel = $this->getRepository(Imovel::class)->find($id);
//        $imovelService->deletar($imovel);

        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);
        $em->remove($imovel);
        $em->flush();
        $this->addFlash('success', 'Imovel de id:'.$id.' deletado com sucesso!!!');

        return $this->redirectToRoute('listar_imoveis');
    }
}

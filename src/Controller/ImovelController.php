<?php


namespace App\Controller;

use App\Entity\Imovel;
use App\Forms\ImovelType;
use App\Service\ImovService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImovelController extends AbstractController
{
    /**
     * @Route ("/imovel/cadastro", name="cadasto_imovel")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cadastroImovel(Request $request, ImovService $imovService)
    {
        $imovel = new Imovel();
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $imovService->salvarImovel($imovel);
            return $this->redirectToRoute('index');
        }

        return $this->render('imovel_visualizar.html.twig', [
            'imovel' => $imovel
        ]);
    }

    /**
     *
     * @Route("/imovel/visualizar/{id}", name="imovel_visualizar")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function imovelVisualizar(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        return $this->render('imovel_visualizar.html.twig', [
            'imovel' => $imovel
        ]);
    }

    /**
     * @Route("/imovel/listar", name="listarImoveis")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function listarImoveis()
    {
        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();
        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/portifolios", name="listar_portifolios")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function imoveisPortifolios()
    {
        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();
        return $this->render('listar_portifolios.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/editarImovel/{id}", name="editarImovel")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editarImovel(int $id, Request $request, ImovService $imovelService)
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);
        if (!$imovel) {
            throw new \Exception('Imóvel não encontrado');
        }
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);
        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
        if ($form->isSubmitted()) {
            $imovelService->editar($id);
            $this->addFlash('success', 'Usuario de id:'.$id.' EDITADO com sucesso!!!');
            return $this->redirectToRoute('listar_imoveis');
        }
    }

    /**
     * @Route("/deletarImovel/{id}", name="deletarImovel")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deletarImovel(int $id, Request $request, ImovService $imovelService)
    {
        $imovelService->deletar($id);
        $this->addFlash('success','Imovel de id '.$id.'Excluído com sucesso');
        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imovelService
        ]);
    }

}




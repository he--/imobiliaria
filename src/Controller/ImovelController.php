<?php


namespace App\Controller;

use App\Entity\Imovel;
use App\Service\ImovelService;
use App\Forms\ImovelType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ImovelController extends AbstractController
{

    /**
     * @Route("/imovel/cadastro", name="cadasto_imovel")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cadastroImovel(Request $request, ImovelService $imovelService)
    {
        $imovel = new Imovel();
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $imovelService->salvar($imovel);
            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/imovel/listar", name="listar_imoveis")
     */
    public function listarImoveis(ImovelService $imovelService)
    {
        $imoveis = $imovelService->listarTodos();
        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/portifolios", name="listar_portifolios")
     */
    public function imoveisPortifolios(ImovelService $imovelService)
    {
        $imoveis = $imovelService->listarTodos();
        return $this->render('listar_portifolios.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/visualizar/{id}", name="imovel_visualizar")
     */
    public function imovelVisualizar(Request $request, ImovelService $imovelService)
    {
        $id = $request->get('id');
        $imovel = $imovelService->findById($id);
        return $this->render('imovel_visualizar.html.twig', [
            'imovel' => $imovel
        ]);
    }

    /**
     * @Route("/imovel/remover/{id}", name="imovel_remover")
     */
    public function removerImovel(int $id, ImovelService $imovelService)
    {
        $imovel = $imovelService->findById($id);
        $imovelService->remover($imovel);
        $this->addFlash('success', 'Imóvel de id:'.$id.' removido com sucesso!!!');
        return $this->redirectToRoute('listar_imoveis');
    }

    /**
     * @Route("/imovel/editar/{id}", name="imovel_editar")
     */
    public function editarImovel(int $id, ImovelService $imovelService, Request $request)
    {
        $imovel = $imovelService->findById($id);
        if (!$imovel) {
            throw new \Exception('Imóvel não encontrado');
        }
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $imovelService -> editar($imovel);
            $this->addFlash('success', 'Imóvel de id:'.$id.' editado com sucesso!!!');
            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
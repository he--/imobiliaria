<?php


namespace App\Controller;


use App\Entity\Imovel;
use App\Forms\ImovelType;
use App\Services\ImovelService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImovelController extends AbstractController
{

    private $imovelService;

    public function __construct(ImovelService $imovelService)
    {
        $this->imovelService = $imovelService;
    }

    /**
     * @Route("/imovel/cadastro", name="cadasto_imovel")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cadastroImovel(Request $request)
    {

        $imovel = new Imovel();
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $this->imovelService->salvar($imovel);

            //redirect
            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/imovel/listar", name="listar_imoveis")
     */
    public function listarImoveis()
    {
        $imoveis = $this->imovelService->listar();

        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/portifolios", name="listar_portifolios")
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
     * @Route("/imovel/visualizar/{id}", name="imovel_visualizar")
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
     * @Route("/editarImovel/{id}", name="editar_imovel")
     */
    public function editarImovel(int $id, Request $request)
    {
        //pegando o imovel a ser editado
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        if (!$imovel) {
            throw new \Exception('Imovel não encontrado');
        }

        //criando o form
        $form = $this->createForm(ImovelType::class, $imovel);


        //renderizando o form
        $form->handleRequest($request);

        if($form->isSubmitted())
        {
            $imovel = $form->getData();
            $this->imovelService->editar($imovel);
            //msg
            $this->addFlash('success', 'Imovel editado com sucesso!!!');

            //redirect
            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', ['form' => $form->createView()]);
    }


    /**
     * @Route("/deletarImovel/{id}", name="deletar_imovel")
     */
    public function deletarImovel(int $id, Request $request)
    {

        $this->imovelService->deletar($id);

        $this->addFlash('success', 'Imovel deletado com sucesso!!!');

        //redirect
        return $this->redirectToRoute('listar_imoveis');
    }





}
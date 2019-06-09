<?php


namespace App\Controller;


use App\Entity\Imovel;
use App\Forms\ImovelType;
use App\Service\ImovelService;
use mysql_xdevapi\Exception;
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

            return $this->redirectToRoute('index');
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
        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();

        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    public function editarImoveis(int $id, Request $request, ImovelService $imovelService)
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        if(!$imovel){
            throw new Exception('Usuário não encontrado');
        }

        $form = $this->createForm(ImovelType::class, $imovel);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            $imovel = $form->getData();

            $imovelService->editar($imovel);

            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('listar_imoveis.html.twig' ,
            ['form' => $form->createView()]);
    }

    public function deletarImoveis(int $id, Request $request, ImovelService $imovelService)
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        $imovelService->deletar($imovel);

        $this->addFlash('sucess', 'Usuario de id:'.$id.'deletado com sucesso!');

        return $this->redirectToRoute('listar_imoveis');
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



}
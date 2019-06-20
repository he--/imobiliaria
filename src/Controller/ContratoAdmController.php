<?php

namespace App\Controller;

use App\Entity\ContratoAdm;
use App\Forms\ContratoAdmType;
use App\Repository\ContratoAdmRepository;
use App\Services\ContratoAdmService;
use App\Services\ImovelService;
use App\Services\UsuarioService;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContratoAdmController extends AbstractController
{
    private $usuario;
    private $imovel;
    private $contratoAdm;

    public function __construct(UsuarioService $usuarioService, ImovelService $imovelService, ContratoAdmService $contratoAdm)
    {
        $this->usuario = $usuarioService;
        $this->imovel = $imovelService;
        $this->contratoAdm = $contratoAdm;

    }


    /**
     * @Route("/contrato/listar", name="contrato_adm_index")
     */
    public function index(ContratoAdmRepository $contratoAdmRepository): Response
    {
        return $this->render('contratoAdm.html.twig', [
            'contrato_adms' => $contratoAdmRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contrato/cadastro", name="contrato_adm_cadastro", methods={"GET","POST"})
     */
    public function cadastro(Request $request): Response
    {
        $contratoAdm = new ContratoAdm();
        $form = $this->createForm(ContratoAdmType::class, $contratoAdm);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $this->contratoAdm->salvar($contratoAdm);
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($contratoAdm);
//            $entityManager->flush();

            return $this->redirectToRoute('contrato_adm_index');
        }

        return $this->render('contratoAdm_cadastro.html.twig', [
            'contrato_adm' => $contratoAdm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contrato/{id}", name="contrato_adm_show", methods={"GET"})
     */
    public function show(ContratoAdm $contratoAdm): Response
    {
        return $this->render('contrato_adm/show.html.twig', [
            'contrato_adm' => $contratoAdm,
        ]);
    }

    /**
     * @Route("/contratoEditar/{id}", name="contrato_adm_editar")
     */
    public function editar(Request $request, ContratoAdm $contratoAdm): Response
    {
        $form = $this->createForm(ContratoAdmType::class, $contratoAdm);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contrato_adm_index', [
                'id' => $contratoAdm->getId(),
            ]);
        }

        return $this->render('contratoAdm_editar.html.twig', [
            'contrato_adm' => $contratoAdm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contratoDeletar/{id}", name="contrato_adm_delete")
     */
    public function delete(Request $request, ContratoAdm $contratoAdm): Response
    {
        $this->contratoAdm->deletar($contratoAdm->getId());

        return $this->redirectToRoute('contrato_adm_index');
    }
}

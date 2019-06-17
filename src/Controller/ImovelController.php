<?php


namespace App\Controller;


use App\Entity\Imovel;
use App\Exception\ServiceException;
use App\Forms\ImovelType;
use App\Service\ImovelService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImovelController
 * @package App\Controller
 */
class ImovelController extends AbstractController
{

    /**
     * @Route("/imovel/cadastro", name="cadasto_imovel")
     *
     * @param Request $request
     * @param ImovelService $service
     * @return RedirectResponse|Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function cadastroImovel(Request $request, ImovelService $service)
    {

        $imovel = new Imovel();
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $service->salvar($imovel);

            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/imovel/listar", name="listar_imoveis")
     * @param ImovelService $service
     * @return Response
     */
    public function listarImoveis(Request $request, ImovelService $service)
    {
        $imoveis = $service->findAll();

        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/portifolios", name="listar_portifolios")
     * @param ImovelService $service
     * @return Response
     */
    public function imoveisPortifolios(ImovelService $service)
    {
        $imoveis = $service->findAll();

        return $this->render('listar_portifolios.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/visualizar/{id}", name="imovel_visualizar")
     * @param int $id
     * @param ImovelService $service
     * @return Response
     * @throws ServiceException
     */
    public function imovelVisualizar(int $id, ImovelService $service)
    {
        $imovel = $service->findById($id);

        return $this->render('imovel_visualizar.html.twig', [
            'imovel' => $imovel
        ]);
    }

    /**
     * @Route("/imovel/editar/{id}", name="editar_imovel")
     * @param int $id
     * @param Request $request
     * @param ImovelService $service
     * @return RedirectResponse|Response
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ServiceException
     */
    public function editarImovel(int $id, Request $request, ImovelService $service)
    {
        $imovel = $service->findById($id);
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $service->editar($id, $form->getData());
            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/imovel/deletar/{id}", name="deletar_imovel")
     * @param int $id
     * @param Request $request
     * @param ImovelService $service
     * @return RedirectResponse|Response
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws ServiceException
     */
    public function deletarImovel(int $id, Request $request, ImovelService $service)
    {
        try
        {
            $service->deletar($id);
            $this->addFlash('success', 'Imóvel de id:'.$id.' deletado com sucesso!!!');
        }
        catch (ServiceException $ex)
        {
            $this->addFlash('error', $ex->getMessage());
        }
        return $this->redirectToRoute('listar_imoveis');
    }

}
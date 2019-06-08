<?php

namespace App\Controller;

use App\Entity\Imovel;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ImovelController
 * @package App\Controller
 */
class ImovelController extends AbstractController
{

    /**
     * @return Response
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->find(Imovel::class, 1);

        return new Response($imovel->getId());
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function cadastrarImovel(Request $request): Response
    {
        $imovel = new Imovel();

        $imovel->setStatus('Alugado');
        $imovel->setCaracteriscas('2 quartos, sala, cozinha, area');
        $imovel->setObservacao('conservada');
        $imovel->setDtCadastro(new \DateTime());
        $imovel->setTipoImovel('casas');

        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();

        return new Response('Cadastrado com sucesso');
    }
}

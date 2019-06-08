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
     * @Route("index")
     */
    public function index()
    {

        return $this->render('imobiliaria.html.twig');

    }

    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request $request
     */
    public function cadastroImovel(Request $request) {
        $imovel = new Imovel();
        $imovel->setStatus("desocupado");
        $imovel->setCaracteristicas("imovel com 3 quartos, 3 banheiros, 2 garagens e jardim");
        $imovel->setObservacao("observacao");
        $imovel->setDataCadastro(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();

        return new Response();
    }
}
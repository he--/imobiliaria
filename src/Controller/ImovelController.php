<?php

namespace App\Controller;

use App\Entity\Imovel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

        return $this->render('imovel.html.twig');

    }

    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request $request
     */
    public function cadastroImovel(Request $request)
    {
        $imovel = new Imovel();
        $imovel->setStatus("Ativo");
        $imovel->setCaracteristicas("Apartamento");
        $imovel->setObservacao( "qualquercoisa");
        $imovel->setDtCadastro( new \DateTime());
        $imovel->setTipoimovel( "Apartamento");
        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();
    }
}
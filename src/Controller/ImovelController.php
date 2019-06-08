<?php


namespace App\Controller;


use App\Entity\Imovel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
        $imovel->setStatus("nome");

        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();
    }
}

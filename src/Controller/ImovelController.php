<?php


namespace App\Controller;


use App\Entity\Imovel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class ImovelController extends AbstractController
{

    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request $request
     */

    public function cadastroImovel (Request $request)
    {
        $imovel = new Imovel();
        $imovel->setStatus("Alugado");
        $imovel->setCaracteristicas("Forrado");
        $imovel->setDtCadastro(new Date());
        $imovel->setTipoImovel("Casa");
        $imovel->setObservacao("Casa TOP");


        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();
    }
}
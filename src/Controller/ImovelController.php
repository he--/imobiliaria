<?php

namespace App\Controller;

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
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request request
     */
    public function cadastroImovel(Request $request)
    {
       $imovel = new Imovel();
       $imovel->setStatus("alugado");
       $imovel->setEnderecoId();

       $em = $this->getDoctrine()->getManager();
       $em->persist($imovel);
       $em->flush();
    }
}
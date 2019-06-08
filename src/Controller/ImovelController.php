<?php

namespace App\Controller;

use App\Entity\Imovel;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ImovelController
 * @package App\Controller
 */
class ImovelController extends AbstractController
{
    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param Request $request
     */
    public function cadastroImovel(Request $request)
    {

       $imovel = new Imovel();
       $imovel->setStatus("novo");
       $imovel->setCaracteristicas("limpa");
       $imovel->setObservacao( "observacao");
       $imovel->setCadastro(new \DateTime());
       $imovel->setImovel("apartamento");

        $em = $this->$this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();

    }

}
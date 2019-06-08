<?php

namespace App\Controller;

use App\Entity\Imovel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;

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
        $imovel->setStatus("ativo");
        $imovel->setCaracteristicas("sei lah");
        $imovel->setObservacao("nao sei");
        $imovel->setDtCadastro(new Date());
        $imovel->setTipoimovel("Casa");

        $em = $this->getDoctrine()->getManager();

        $em->persist($imovel);

        $em->flush();
    }
}
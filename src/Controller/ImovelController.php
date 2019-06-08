<?php

namespace App\Controller;

use App\Entity\Imovel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class ImobiliariaController
 * @package App\Controller
 */
class ImovelController extends AbstractController
{

    /**
     * @Route("imovel/cadastro", name="imovel_cadastro")
     * @param  Request $request
     */
    public function cadastroImovel(Request $request)
    {
        $imovel = new Imovel();
        $imovel->setStatus("Nome");
        $imovel->setCaracteristicas("Caracteristica");
        $imovel->setDtCadastro(new \DateTime());
        $imovel->setTipoImovel("Casa");
        $imovel->setObservacao("Sem OBS");
//        $imovel->setEnderecoId()

        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();

        return new Response();
    }
}
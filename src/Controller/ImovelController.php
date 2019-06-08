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
     * @Route("index")
     * @param 
     */
    public function index()
    {

        return $this->render('imovel.html.twig');

    }
    
    /**
     * @Route("imovel/cadastro", name="cadastro_imovel")
     * @param Request $request
     */
    public function cadastroImovel(Request $request)
    {
        $imovel = new Imovel();
        $imovel->setStatus("Alugado");
        $imovel->setCaracteristica("Forrado");
        $imovel->setEndereco("Rua da Areia");
        $imovel->setObservacao("OK");
        $imovel->setDataCadastro(new Date());

        $em = $this->getDoctrine()->getManager();
        $em->persist($imovel);
        $em->flush();
    }
}
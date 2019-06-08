<?php


namespace App\Controller;

use App\Entity\Imovel;
use HttpUtil;
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
        $imovel->setId(1);
        $imovel->setTipoImovel("Casa");
        $imovel->setStatus("nome");
        $imovel->setCaracteristicas("caracteristica");
        $imovel->setObservacao("observacao");
        $imovel->setDtCadastro(new Date());

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($imovel);
        $entityManager->flush();
    }
}
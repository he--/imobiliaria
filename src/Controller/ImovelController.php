<?php





namespace App\Controller;





use App\Entity\Imovel;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;



class ImovelController extends AbstractController

{



    /**

     * @Route("/imovel/cadastro", name="cadasto_imovel")

     *

     * @param Request $request

     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response

     */

    public function cadastroImovel(Request $request){

       $imovel = new Imovel();
       $imovel -> setStatus("Nome");

       $em = $this ->getDoctrine()->getManager();

       $em->persist($imovel);
       $em->flush();

   }

}
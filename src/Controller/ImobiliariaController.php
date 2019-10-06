<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ImobiliariaController
 * @package App\Controller
 */
class ImobiliariaController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {

        return $this->render('index.html.twig');

    }

    /**
     * @Route("dashboard", name="dashboard")
     */
    public function dashboard()
    {

        return $this->render('imobiliaria.html.twig');

    }
}
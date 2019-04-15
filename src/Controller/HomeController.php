<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }
    /**
     * @Route("/carte-galactique", name="carte")
     */
    public function atlas()
    {
        return $this->render('home/carte.html.twig');
    }
    /**
     * @Route("/encyclopedie", name="encyclopedie")
     */
    public function encyclopedie()
    {
        return $this->render('home/encyclopedie.html.twig');
    }
}

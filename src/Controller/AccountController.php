<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        return $this->render('account/profil.html.twig');
    }
    /**
     * @Route("/inscription", name="register")
     */
    public function register()
    {
        return $this->render('account/register.html.twig');
    }
}

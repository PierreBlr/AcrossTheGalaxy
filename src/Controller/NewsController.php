<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news/inrp", name="newsinrp")
     */
    public function inrp()
    {
        return $this->render('news/inrp.html.twig');
    }
    /**
     * @Route("/news/hrp", name="newshrp")
     */
    public function hrp()
    {
        return $this->render('news/hrp.html.twig');
    }
}

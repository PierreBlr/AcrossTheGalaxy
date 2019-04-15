<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelpController extends AbstractController
{
    /**
     * @Route("/help/faq", name="faq")
     */
    public function faq()
    {
        return $this->render('help/faq.html.twig');
    }
    /**
     * @Route("/help/mentions", name="mentions")
     */
    public function mentions()
    {
        return $this->render('help/mentions.html.twig');
    }
    /**
     * @Route("/help/utilisation", name="conditions")
     */
    public function conditions()
    {
        return $this->render('help/conditions.html.twig');
    }
    /**
     * @Route("/help/communaute", name="communaute")
     */
    public function communaute()
    {
        return $this->render('help/communaute.html.twig');
    }
    /**
     * @Route("/help/qui-sommes-nous", name="quisommesnous")
     */
    public function whoweare()
    {
        return $this->render('help/quisommesnous.html.twig');
    }
    /**
     * @Route("/help/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('help/contact.html.twig');
    }
}

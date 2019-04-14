<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RulesController extends AbstractController
{
    /**
     * @Route("/regles", name="rules")
     */
    public function index()
    {
        return $this->render('baseuq.html.twig');
    }
    /**
     * @Route("/règles/principes", name="lejeu")
     */
    public function principes()
    {
        return $this->render('rules/lejeu.html.twig');
    }
    /**
     * @Route("/règles/irc", name="irc")
     */
    public function irc()
    {
        return $this->render('rules/irc.html.twig');
    }
    /**
     * @Route("/règles/us", name="us")
     */
    public function us()
    {
        return $this->render('rules/us.html.twig');
    }
    /**
     * @Route("/règles/lesregles", name="regles")
     */
    public function regles()
    {
        return $this->render('rules/regles.html.twig');
    }
    /**
     * @Route("/règles/utilisation-du-sabre-laser", name="guide")
     */
    public function guide()
    {
        return $this->render('rules/guidesabrelaser.html.twig');
    }
    /**
     * @Route("/règles/missions", name="missions")
     */
    public function missions()
    {
        return $this->render('rules/missions.html.twig');
    }
    /**
     * @Route("/règles/nouvelle-republique", name="republic")
     */
    public function newrepublic()
    {
        return $this->render('rules/republic.html.twig');
    }
    /**
     * @Route("/règles/ordre-jedi", name="jedi")
     */
    public function ordrejedi()
    {
        return $this->render('rules/jedi.html.twig');
    }
    /**
     * @Route("/règles/contrebandier", name="contrebandier")
     */
    public function contrebandier()
    {
        return $this->render('rules/contrebandier.html.twig');
    }
    /**
     * @Route("/règles/empire", name="empire")
     */
    public function empire()
    {
        return $this->render('rules/empire.html.twig');
    }
    /**
     * @Route("/règles/grades", name="grades")
     */
    public function grades()
    {
        return $this->render('rules/grades.html.twig');
    }
    /**
     * @Route("/règles/guide-sabre-laser", name="guidels")
     */
    public function guidels()
    {
        return $this->render('rules/guidels.html.twig');
    }
    /**
     * @Route("/règles/competences", name="competences")
     */
    public function competences()
    {
        return $this->render('rules/competences.html.twig');
    }
}

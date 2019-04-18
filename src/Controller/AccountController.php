<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Entity\MembreHrp;
use App\Form\RegistrationPersoType;
use App\Form\RegistrationMembreType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
     * @Route("/inscription", name="registration")
     */
    public function registrationmembre(Request $request, ObjectManager $manager)
    {
        $membrehrp = new MembreHrp();

        $step2 = $this->createForm(RegistrationMembreType::class, $membrehrp);
        $step2->handleRequest($request);

        if($step2->isSubmitted() && $step2->isValid()){
            $membrehrp->setCreatedAt(new \Datetime());
            $manager->persist($membrehrp);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        
        return $this->render('account/inscription.html.twig',[
            'form' => $step2->createView()
        ]);
    }
    /**
     * @Route("/inscriptionperso", name="registrationperso")
     */
    public function registrationperso(Request $request, ObjectManager $manager)
    {
        $membre = new Membre();

        $step1 = $this->createForm(RegistrationPersoType::class, $membre);
        $step1->handleRequest($request);

        if($step1->isSubmitted() && $step1->isValid()){
            $manager->persist($membre);
        }

        return $this->render('account/inscriptionperso.html.twig',[
            'form' => $step1->createView()
        ]);

    }
}

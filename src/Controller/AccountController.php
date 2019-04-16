<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Entity\MembreHrp;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\RegistrationMembreType;

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
    public function registration(Request $request, ObjectManager $manager)
    {
        //$membre = new Membre();
        $membrehrp = new MembreHrp();


        /*$step1 = $this->createForm(RegistrationType::class, $membre);
        $step1->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($membre);
        }*/
        $step2 = $this->createForm(RegistrationMembreType::class, $membrehrp);
        $step2->handleRequest($request);

        if($step2->isSubmitted() && $form->isValid()){
            $manager->persist($membrehrp);
            $manager->flush();
        }
        
        return $this->render('account/inscription.html.twig',[
            'form' => $step2->createView()
        ]);
    }
}

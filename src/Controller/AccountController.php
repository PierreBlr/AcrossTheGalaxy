<?php

namespace App\Controller;

use App\Entity\Race;
use App\Entity\Membre;
use App\Form\RaceType;
use App\Entity\MembreHrp;
use App\Entity\Profession;
use App\Form\RegistrationPersoType;
use App\Form\RegistrationMembreType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/inscriptioncharte", name="registrationcharte")
     */
    public function registrationcharte(Request $request, ObjectManager $manager)
    {
        return $this->render('account/inscriptioncharteutilisateur.html.twig');
    }
    /**
     * @Route("/inscription", name="registration")
     */
    public function registrationmembre(Request $request, ObjectManager $manager,UserPasswordEncoderInterface $encoder)
    {
        $membrehrp = new MembreHrp();

        $step2 = $this->createForm(RegistrationMembreType::class, $membrehrp);
        $step2->handleRequest($request);

        if($step2->isSubmitted() && $step2->isValid()){
            $hash = $encoder->encodePassword($membrehrp,$membrehrp->getPassword());
            $membrehrp->setPassword($hash);

            $membrehrp->setCreatedAt(new \Datetime());
            $manager->persist($membrehrp);
            

            return $this->redirectToRoute('registrationperso');
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

        $races = $this->getDoctrine()
        ->getRepository(Race::class)
        ->findAll();

        $classes = $this->getDoctrine()
        ->getRepository(Profession::class)
        ->findAll();

        $step1 = $this->createForm(RegistrationPersoType::class, $membre);
        $step1->handleRequest($request);

        if($step1->isSubmitted() && $step1->isValid()){
            $manager->persist($membre);

            return $this->redirectToRoute('home');
        }

        
        return $this->render('account/inscriptionperso.html.twig',[
            'form' => $step1->createView(),
            'races'=> $races,
            'classes'=>$classes
        ]);

    }
}

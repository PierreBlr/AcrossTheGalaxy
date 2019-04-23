<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationPersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('age', TextType::class)
            ->add('taille',TextType::class)
            ->add('poids', TextType::class)
            ->add('homeworld', TextType::class)
            ->add('biographie', TextareaType::class)
            ->add('description', TextareaType::class)
            ->add('impression', TextareaType::class)
            ->add('avatar', FileType::class);
            //->add('classe');
        
            $choices = [
                'Masculin' => 'M',
                'f221' => 'F'
            ];
     
            $builder
                ->add('genre', ChoiceType::class, [
                    
                    'choices' => $choices,
                    'expanded' => true,  // => boutons
                    'label' => 'Genre',
            ]);
          
            //->add('membreHrp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}

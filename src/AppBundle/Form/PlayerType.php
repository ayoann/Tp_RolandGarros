<?php
namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Created by PhpStorm.
 * User: Marie
 * Date: 27/09/2017
 * Time: 11:22
 */

class PlayerType extends \Symfony\Component\Form\AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label' => 'Nom', 'translation_domain' => 'AppBundle'))
            ->add('lastname', TextType::class, array('label' => 'Prénom', 'translation_domain' => 'AppBundle'))
            ->add('nationality', EntityType::class, array(
                'class' => 'AppBundle\Entity\Nationality',
                'placeholder' => 'Choisir la nationalité',
                'required' => false,
                'choice_label' => 'name',
                'translation_domain' => 'AppBundle',
                'query_builder' => function (\AppBundle\Repository\NationalityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.name', 'ASC');
                },
            ))
            ->add('female', ChoiceType::class, array(
                'translation_domain' => 'AppBundle',
                'placeholder' => 'Choisir le sexe',
                'required' => false,
                'choices' => array(
                    'Femme' => true,
                    'Homme' => false
                )
            ))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer', 'translation_domain' => 'AppBundle'));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Player'
        ));
    }
}
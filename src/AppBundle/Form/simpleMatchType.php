<?php


    namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class simpleMatchType extends AbstractType
{


        /**
         * @param FormBuilderInterface $builder
         * @param array @options
         */
    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
                    ->add('tournamentType', ChoiceType::class)
                    ->add('player1', ChoiceType::class)
                    ->add('player2', ChoiceType::class)
                    ->add('courtNumber', ChoiceType::class)
                    ->add('Referee', ChoiceType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TennisMatch',
        ));
    }
}


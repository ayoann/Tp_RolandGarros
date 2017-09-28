<?php


namespace AppBundle\Form;


use AppBundle\Repository\PersonRepository;
use AppBundle\Repository\PlayerRepository;
use AppBundle\Repository\RefereeRepository;
use AppBundle\Repository\TennisCourtRepository;
use AppBundle\Repository\TournamentRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MatchSimpleType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tournament',   EntityType::class, array(
                'class' => 'AppBundle\Entity\Tournament',
                'label' => 'Tournoi',
                'choice_label' => 'name',
                'placeholder' => 'Choisir un tournoi',
                'required' => false,
                'translation_domain' => 'AppBundle',
                'query_builder' => function(TournamentRepository $t) {
                    return $t->createQueryBuilder('tr')
                        ->where('tr.simple = 1')
                        ->orderBy('tr.id', 'ASC');
                }))
            ->add('tennisCourt',   EntityType::class, array(
                'class' => 'AppBundle\Entity\TennisCourt',
                'label' => 'Court',
                'placeholder' => 'Choisir un court',
                'required' => false,
                'choice_label' => 'name',
                'translation_domain' => 'AppBundle',
                'query_builder' => function(TennisCourtRepository $t) {
                    return $t->createQueryBuilder('t')
                        ->orderBy('t.id', 'ASC');
                }))
            ->add('referee',   EntityType::class, array(
                'class' => 'AppBundle\Entity\Referee',
                'label' => 'referee',
                'placeholder' => 'Choisir un arbitre',
                'required' => false,
                'translation_domain' => 'AppBundle',
                'query_builder' => function(RefereeRepository $r){
                    return $r->createQueryBuilder('r')
                        ->orderBy('r.lastname', 'ASC');
                }))
            ->add('valider', SubmitType::class);

    }




    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TennisMatch'
        ));
    }

}
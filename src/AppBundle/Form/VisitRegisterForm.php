<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
/**
 *
 */
class VisitRegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('doctor' , EntityType::class, [
          'class' => 'AppBundle:Doctor',
          'choice_label' => 'name',

        ])
        ->add('date', DateTimeType::class)
        ->add('save', SubmitType::class)
      ;
    }
}

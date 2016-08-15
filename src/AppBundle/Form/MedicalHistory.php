<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


/**
 * Add blood-test form
 */
class MedicalHistory extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder , array $options)
  {
    $builder
      ->add('description', TextareaType::class)
      ->add('medicines', TextareaType::class)
      ->add('save', SubmitType::class)
    ;
  }
}

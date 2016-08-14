<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * Add blood-test form
 */
class BloodTestForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder , array $options)
  {
    $builder
      ->add('rbc')
      ->add('hgb')
      ->add('hct')
      ->add('mcv')
      ->add('mch')
      ->add('mchc')
      ->add('wbc')
      ->add('plt')
      ->add('save', SubmitType::class)
    ;
  }
}

<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


/**
 *
 */
class PersonalDataForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('name')
        ->add('surname')
        ->add('pesel')
        ->add('birth_date')
        ->add('street')
        ->add('post_code')
        ->add('city')
        ->add('sex', ChoiceType::class,[
          'choices' => [
            'Male' => 'male',
            'Female'=> 'female'
          ]
        ])
        ->add('save', SubmitType::class)
      ;
    }

}

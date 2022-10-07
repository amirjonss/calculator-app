<?php

namespace App\Form;

use App\Entity\Calculator;
use App\operation\Operation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstNum', IntegerType::class)
            ->add('operation', ChoiceType::class,[
                'choices' => [
                    Operation::MINUS => Operation::MINUS,
                    Operation::PLUS => Operation::PLUS,
                    Operation::DIVIDE => Operation::DIVIDE,
                    Operation::MULTIPLY => Operation::MULTIPLY
                ]
            ])
            ->add('SecondNum', IntegerType::class)
            ->add('Calculate', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calculator::class,
        ]);
    }
}


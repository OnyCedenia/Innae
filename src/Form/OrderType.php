<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('size', ChoiceType::class, [
                'choices' => [
                    'Petit' => 'S',
                    'Moyen' => 'M',
                    'Grand' => 'L',
                ],
                'label' => 'Taille',
            ])
            ->add('color', ChoiceType::class, [
                'choices' => [
                    'Noir' => 'black',
                    'Rouge' => 'red',
                    'Bleu' => 'blue',
                ],
                'label' => 'Couleur',
            ])
            ->add('accessory', null, [
                'label' => 'Accessoire (optionnel)',
                'required' => false,
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}

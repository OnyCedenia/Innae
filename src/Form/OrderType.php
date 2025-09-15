<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customerName', TextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Ex : Jean Dupont'],
            ])
            ->add('customerEmail', TextType::class, [
                'label' => 'Email',
                'attr' => ['placeholder' => 'Ex : jean@example.com'],
            ])
            ->add('customerPhone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['placeholder' => 'Ex : 0612345678'],
            ])
            ->add('size', TextType::class, [
                'label' => 'Taille (cm)',
                'attr' => ['placeholder' => 'Ex : 56'],
            ])
            ->add('color', ChoiceType::class, [
                'label' => 'Couleur',
                'choices' => [
                    'Rouge' => 'red',
                    'Bleu' => 'blue',
                    'Vert' => 'green',
                    'Noir' => 'black',
                    'Blanc' => 'white',
                ],
                'expanded' => true,
            ])
            ->add('accessory', ChoiceType::class, [
                'label' => 'Accessoires',
                'choices' => [
                    'Oreilles' => 'ears',
                    'Plume' => 'feather',
                    'Pompon' => 'pompon',
                ],
                'expanded' => true,  
                'multiple' => false, 
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}

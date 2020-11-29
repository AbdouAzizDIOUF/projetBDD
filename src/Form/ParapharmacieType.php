<?php

namespace App\Form;

use App\Entity\Parapharmacie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParapharmacieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('codeProd')
            ->add('prixProd')
            ->add('noticeProd')
            ->add('fabriquant')
            ->add('estDisponible')
            ->add('stock')
            ->add('expire_at')
            ->add('rayon')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parapharmacie::class,
        ]);
    }
}

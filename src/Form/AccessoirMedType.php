<?php

namespace App\Form;

use App\Entity\AccessoirMed;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccessoirMedType extends AbstractType
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
            ->add('rayon')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AccessoirMed::class,
        ]);
    }
}

<?php

namespace Pasi\bibliotecaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CancionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('orden')
            ->add('descripcion')
            ->add('letra')
            ->add('duracion')
            ->add('album')
            ->add('file','file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\bibliotecaBundle\Entity\Cancion'
        ));
    }

    public function getName()
    {
        return 'pasi_bibliotecabundle_canciontype';
    }
}

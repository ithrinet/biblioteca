<?php

namespace Pasi\bibliotecaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('publicacion')
            ->add('descripcion')
            ->add('artista')
            ->add('categoria')
            ->add('file','file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pasi\bibliotecaBundle\Entity\Album'
        ));
    }

    public function getName()
    {
        return 'pasi_bibliotecabundle_albumtype';
    }
}

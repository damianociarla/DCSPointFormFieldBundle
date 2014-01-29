<?php

namespace DCS\Form\PointFormFieldBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DCS\Form\PointFormFieldBundle\DataTransformer\TextToPointTransformer;

class PointType extends AbstractType
{
    private $parentType;

    public function __construct($parentType)
    {
        $this->parentType = $parentType;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'functionFillFromGoogleResult' => $options['functionFillFromGoogleResult'],
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addViewTransformer(new TextToPointTransformer(), true);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'functionFillFromGoogleResult' => null,
        ));

        $resolver->setAllowedTypes(array(
            'functionFillFromGoogleResult' => array('string', 'null'),
        ));
    }

    public function getParent()
    {
        return $this->parentType;
    }

    public function getName()
    {
        return 'point';
    }
}
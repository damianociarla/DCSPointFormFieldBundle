<?php

namespace DCS\Form\PointFormFieldBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use DCS\Form\PointFormFieldBundle\DataTransformer\TextToPointTransformer;

class PointType extends AbstractType
{
    private $parentType;

    public function __construct($parentType)
    {
        $this->parentType = $parentType;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addViewTransformer(new TextToPointTransformer(), true);
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
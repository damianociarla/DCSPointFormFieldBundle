<?php

namespace DCS\Form\PointFormFieldBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use DCS\Form\PointFormFieldBundle\DependencyInjection\Compiler\TwigFormPass;

class DCSFormPointFormFieldBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TwigFormPass());
    }
}

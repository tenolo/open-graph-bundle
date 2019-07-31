<?php

namespace Tenolo\Bundle\OpenGraphBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tenolo\Bundle\OpenGraphBundle\DependencyInjection\CompilerPass\OpenGraphMapCompilerPass;
use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;

/**
 * Class TenoloOpenGraphBundle
 *
 * @package Tenolo\Bundle\OpenGraphBundle
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
class TenoloOpenGraphBundle extends Bundle
{

    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new OpenGraphMapCompilerPass());

        $container->registerForAutoconfiguration(OpenGraphMapInterface::class)->addTag('tenolo_open_graph.map');
    }
}

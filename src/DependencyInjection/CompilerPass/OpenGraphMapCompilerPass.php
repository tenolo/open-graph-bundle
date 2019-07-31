<?php

namespace Tenolo\Bundle\OpenGraphBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class OpenGraphMapCompilerPass
 *
 * @package Tenolo\Bundle\OpenGraphBundle\DependencyInjection\CompilerPass
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
class OpenGraphMapCompilerPass implements CompilerPassInterface
{

    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->findDefinition('tenolo_open_graph.manager');
        $taggedServices = $container->findTaggedServiceIds('tenolo_open_graph.map');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('register', [new Reference($id)]);
        }
    }
}
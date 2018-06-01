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
 * @company tenolo GbR
 */
class OpenGraphMapCompilerPass implements CompilerPassInterface
{

    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('tenolo_open_graph.manager');
        $taggedServices = $container->findTaggedServiceIds('tenolo_open_graph.map');

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('register', [new Reference($id)]);
        }
    }
}
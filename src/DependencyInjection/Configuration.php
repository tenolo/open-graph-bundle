<?php

namespace Tenolo\Bundle\OpenGraphBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Tenolo\Bundle\OpenGraphBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tenolo_open_graph');

        return $treeBuilder;
    }
}

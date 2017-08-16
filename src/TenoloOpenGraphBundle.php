<?php

namespace Tenolo\Bundle\OpenGraphBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tenolo\Bundle\OpenGraphBundle\DependencyInjection\CompilerPass\OpenGraphMapCompilerPass;

/**
 * Class TenoloOpenGraphBundle
 *
 * @package Tenolo\Bundle\OpenGraphBundle
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloOpenGraphBundle extends Bundle
{

    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new OpenGraphMapCompilerPass());
    }
}

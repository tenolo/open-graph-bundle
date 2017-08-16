<?php

namespace Tenolo\Bundle\OpenGraphBundle\Manager;

use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;

/**
 * Interface MapManagerInterface
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Manager
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface MapManagerInterface
{

    /**
     * @param OpenGraphMapInterface $map
     */
    public function register(OpenGraphMapInterface $map);

    /**
     * @return OpenGraphMapInterface[]
     */
    public function getMaps();
}

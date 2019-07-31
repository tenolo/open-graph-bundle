<?php

namespace Tenolo\Bundle\OpenGraphBundle\Manager;

use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;

/**
 * Interface MapManagerInterface
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Manager
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
interface MapManagerInterface
{

    /**
     * @param OpenGraphMapInterface $map
     */
    public function register(OpenGraphMapInterface $map): void;

    /**
     * @return OpenGraphMapInterface[]
     */
    public function getMaps(): array;
}

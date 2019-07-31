<?php

namespace Tenolo\Bundle\OpenGraphBundle\Manager;

use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;

/**
 * Class MapManager
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Manager
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
class MapManager implements MapManagerInterface
{

    /** @var OpenGraphMapInterface[] */
    protected $maps = [];

    /**
     * @param OpenGraphMapInterface $map
     */
    public function register(OpenGraphMapInterface $map): void
    {
        $this->maps[] = $map;
    }

    /**
     * @return OpenGraphMapInterface[]
     */
    public function getMaps(): array
    {
        return $this->maps;
    }
}
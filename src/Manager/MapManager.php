<?php

namespace Tenolo\Bundle\OpenGraphBundle\Manager;

use Tenolo\Bundle\OpenGraphBundle\Map\OpenGraphMapInterface;

/**
 * Class MapManager
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Manager
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class MapManager implements MapManagerInterface
{

    /** @var OpenGraphMapInterface[] */
    protected $maps = [];

    /**
     * @param OpenGraphMapInterface $map
     */
    public function register(OpenGraphMapInterface $map)
    {
        $this->maps[] = $map;
    }

    /**
     * @return OpenGraphMapInterface[]
     */
    public function getMaps()
    {
        return $this->maps;
    }
}
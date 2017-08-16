<?php

namespace Tenolo\Bundle\OpenGraphBundle\Renderer;

/**
 * Interface OpenGraphRendererInterface
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Renderer
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface OpenGraphRendererInterface
{

    /**
     * @param mixed $data
     *
     * @return string
     */
    public function render($data);
}

<?php

namespace Tenolo\Bundle\OpenGraphBundle\Twig\Extension;

use Tenolo\Bundle\OpenGraphBundle\Renderer\OpenGraphRendererInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class OpenGraphExtension
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Twig\Extension
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class OpenGraphExtension extends AbstractExtension
{

    /** @var OpenGraphRendererInterface */
    protected $renderer;

    /**
     * @param OpenGraphRendererInterface $renderer
     */
    public function __construct(OpenGraphRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('opengraph_render', [$this->renderer, 'render'], ['is_safe' => ['html']]),
        ];
    }
}
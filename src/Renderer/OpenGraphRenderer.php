<?php

namespace Tenolo\Bundle\OpenGraphBundle\Renderer;

use Tenolo\Bundle\OpenGraphBundle\Exception\NotSupported;
use Tenolo\Bundle\OpenGraphBundle\Manager\MapManagerInterface;
use Tenolo\Bundle\OpenGraphBundle\OpenGraph\DocumentWriter;

/**
 * Class OpenGraphRenderer
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Renderer
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class OpenGraphRenderer implements OpenGraphRendererInterface
{

    /** @var MapManagerInterface */
    protected $mapManager;

    /**
     * @param MapManagerInterface $registry
     */
    public function __construct(MapManagerInterface $registry)
    {
        $this->mapManager = $registry;
    }

    /**
     * @inheritdoc
     */
    public function render($data)
    {
        $document = null;

        foreach ($this->mapManager->getMaps() as $map) {
            if ($map->supports($data)) {
                if (is_null($document)) {
                    $document = $this->createDocument();
                }

                $map->map($document, $data);
            }
        }

        if ($document) {
            return $document->render();
        }

        throw new NotSupported($data, $this->mapManager);
    }

    /**
     * @return MapManagerInterface
     */
    public function getMapManager()
    {
        return $this->mapManager;
    }

    /**
     * @return DocumentWriter
     */
    protected function createDocument()
    {
        return new DocumentWriter();
    }
}
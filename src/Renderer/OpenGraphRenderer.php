<?php

namespace Tenolo\Bundle\OpenGraphBundle\Renderer;

use Tenolo\Bundle\OpenGraphBundle\Manager\MapManagerInterface;
use Tenolo\Bundle\OpenGraphBundle\OpenGraph\DocumentWriter;

/**
 * Class OpenGraphRenderer
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Renderer
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
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
    public function render($data, array $additional = [])
    {
        $document = null;

        foreach ($this->mapManager->getMaps() as $map) {
            if ($map->supports($data)) {
                if (is_null($document)) {
                    $document = $this->createDocument();
                }

                $map->map($document, $data, $additional);
            }
        }

        if ($document) {
            return $document->render();
        }

        return '';
    }

    /**
     * @return MapManagerInterface
     */
    protected function getMapManager()
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
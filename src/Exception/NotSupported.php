<?php

namespace Tenolo\Bundle\OpenGraphBundle\Exception;

/**
 * Class NotSupported
 *
 * @package Tenolo\Bundle\OpenGraphBundle\Exception
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class NotSupported extends \RuntimeException
{

    /** @var mixed */
    protected $data;

    /**
     * @param object     $data
     * @param int        $code
     * @param \Exception $previous
     */
    public function __construct($data, $code = 0, \Exception $previous = null)
    {
        parent::__construct(sprintf('No OpenGraph map in the registry supports class "%s".', get_class($entity)));

        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}

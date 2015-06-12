<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command;

class QueueableCommand
{

    const TYPE_ADD_VALUE_CONSTRAINT = 'add_value_constraint';

    /**
     * @var array
     */
    private $allowableTypes = [
        self::TYPE_ADD_VALUE_CONSTRAINT
    ];

    /**
     * @var callable
     */
    private $callable;

    /**
     * @var string
     */
    private $type;

    /**
     * @param callable $callable
     * @param string $type
     */
    public function __construct(callable $callable, $type)
    {
        if (!in_array($type, $this->allowableTypes)) {
            throw new \InvalidArgumentException("Unsupported type: $type");
        }

        $this->callable = $callable;
        $this->type = $type;
    }

    public function execute()
    {
        $callable = $this->callable;
        $callable();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

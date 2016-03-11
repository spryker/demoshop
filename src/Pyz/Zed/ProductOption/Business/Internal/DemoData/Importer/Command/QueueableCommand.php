<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command;

class QueueableCommand
{

    const TYPE_FLUSH_BUFFER = 'flush_buffer';

    const TYPE_ADD_VALUE_CONSTRAINT = 'add_value_constraint';

    /**
     * @var array
     */
    private $allowableTypes = [
        self::TYPE_FLUSH_BUFFER,
        self::TYPE_ADD_VALUE_CONSTRAINT,
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

    /**
     * @return void
     */
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
<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PhpStan\DynamicType;

use PHPStan\Type\DynamicMethodReturnTypeExtension;
use Spryker\Zed\Kernel\Communication\Console\Console;

class ConsoleDynamicTypeExtension extends AbstractSprykerDynamicTypeExtension implements DynamicMethodReturnTypeExtension
{
    /**
     * @var array
     */
    protected $methodResolves = [
        'getFacade' => true,
        'getQueryContainer' => true,
        'getFactory' => true,
    ];

    /**
     * @return string
     */
    public function getClass(): string
    {
        return Console::class;
    }
}

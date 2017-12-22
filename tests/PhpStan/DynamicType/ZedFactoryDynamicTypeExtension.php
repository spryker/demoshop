<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PhpStan\DynamicType;

use PHPStan\Type\DynamicMethodReturnTypeExtension;
use Spryker\Zed\Kernel\AbstractFactory;

class ZedFactoryDynamicTypeExtension extends AbstractSprykerDynamicTypeExtension implements DynamicMethodReturnTypeExtension
{
    /**
     * @var array
     */
    protected $methodResolves = [
        'getQueryContainer' => true,
        'getFacade' => true,
    ];

    /**
     * @return string
     */
    public static function getClass(): string
    {
        return AbstractFactory::class;
    }
}

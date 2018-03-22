<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PhpStan\DynamicType;

use PHPStan\Type\DynamicMethodReturnTypeExtension;
use Spryker\Shared\Kernel\AbstractBundleConfig;

class ConfigDynamicTypeExtension extends AbstractSprykerDynamicTypeExtension implements DynamicMethodReturnTypeExtension
{
    /**
     * @var array
     */
    protected $methodResolves = [
        'getSharedConfig' => true,
    ];

    /**
     * @return string
     */
    public function getClass(): string
    {
        return AbstractBundleConfig::class;
    }
}

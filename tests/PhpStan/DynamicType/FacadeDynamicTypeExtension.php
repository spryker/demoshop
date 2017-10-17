<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PhpStan\DynamicType;

use PHPStan\Type\DynamicMethodReturnTypeExtension;
use Spryker\Zed\Kernel\Business\AbstractFacade;

class FacadeDynamicTypeExtension extends AbstractSprykerDynamicTypeExtension implements DynamicMethodReturnTypeExtension
{
    protected $methodResolves = [
        'getFactory' => true,
    ];

    /**
     * @return string
     */
    public static function getClass(): string
    {
        return AbstractFacade::class;
    }
}

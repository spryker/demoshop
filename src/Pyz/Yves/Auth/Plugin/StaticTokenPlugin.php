<?php

namespace Pyz\Yves\Auth\Plugin;

use SprykerFeature\Shared\Auth\Client\StaticToken as SharedStaticToken;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerEngine\Shared\Kernel\Factory\FactoryInterface;

class StaticTokenPlugin extends SharedStaticToken
{
    public function __construct(FactoryInterface $factory, LocatorLocatorInterface $locator)
    {
    }
}

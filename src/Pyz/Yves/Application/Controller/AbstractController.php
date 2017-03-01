<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Controller;

use Spryker\Shared\Storage\StorageConstants;
use Spryker\Yves\Kernel\Controller\AbstractController as SprykerAbstractController;
use Spryker\Yves\Storage\Controller\StorageCacheControllerTrait;

abstract class AbstractController extends SprykerAbstractController {

    use StorageCacheControllerTrait;

    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_REPLACE;

    public function initialize()
    {
        parent::initialize();

        $this->setStorageCacheStrategy(static::STORAGE_CACHE_STRATEGY);
    }

}

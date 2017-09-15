<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Controller;

use Spryker\Shared\Storage\StorageConstants;
use Spryker\Yves\Kernel\Controller\AbstractController as SprykerAbstractController;
use Spryker\Yves\Storage\Controller\StorageCacheControllerTrait;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class AbstractController extends SprykerAbstractController
{

    use StorageCacheControllerTrait;

    const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_REPLACE;

    /**
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->initializeStorageCacheStrategy(static::STORAGE_CACHE_STRATEGY);
    }

}

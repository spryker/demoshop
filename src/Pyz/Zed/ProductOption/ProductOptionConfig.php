<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Zed\ProductOption\ProductOptionConfig as SprykerProductOptionConfig;

class ProductOptionConfig extends SprykerProductOptionConfig
{

    const ADAPTER_MYSQL = 'mysql';

    /**
     * @return string
     */
    public function getOptionsDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/data/product-options.xml';
    }

    /**
     * @return string
     */
    public function getProductOptionDemoDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/data/product-option-assignments.xml';
    }

    /**
     * @return string
     */
    public function getDatabaseAdapter()
    {
        $propelConfig = $this->get(ApplicationConstants::PROPEL);

        $dbAdapter = $propelConfig['database']['connections']['default']['adapter'];

        return $dbAdapter;
    }

}

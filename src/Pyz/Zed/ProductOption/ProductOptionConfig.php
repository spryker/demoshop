<?php

namespace Pyz\Zed\ProductOption;

use SprykerFeature\Zed\ProductOption\ProductOptionConfig as SprykerProductOptionConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;

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
        $propelConfig = $this->get(ApplicationConfig::PROPEL);

        $dbAdapter = $propelConfig['database']['connections']['default']['adapter'];

        return $dbAdapter;
    }

}

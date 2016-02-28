<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{

    const RESOURCE_CATEGORY = 'category';
    const RESOURCE_CATEGORY_ROOT = 'category root';
    const RESOURCE_CATEGORY_CATALOG = 'category hierarchy';

    const RESOURCE_NAVIGATION = 'navigation';

    const RESOURCE_GLOSSARY = 'glossary';
    const RESOURCE_GLOSSARY_TRANSLATION = 'glossary translation';

    const RESOURCE_PRODUCT = 'product';
    const RESOURCE_PRODUCT_CATEGORY = 'product category';
    const RESOURCE_PRODUCT_PRICE = 'product price';
    const RESOURCE_PRODUCT_SEARCH = 'product search';
    const RESOURCE_PRODUCT_STOCK = 'product stock';

    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/';
    }

}

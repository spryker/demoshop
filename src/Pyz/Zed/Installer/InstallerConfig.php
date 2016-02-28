<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{

    const RESOURCE_CATEGORY = 'RESOURCE_CATEGORY';
    const RESOURCE_CATEGORY_ROOT = 'RESOURCE_CATEGORY_ROOT';
    const RESOURCE_CATEGORY_CATALOG = 'RESOURCE_CATEGORY_CATALOG';

    const RESOURCE_CMS_BLOCK = 'RESOURCE_CMS_BLOCK';
    const RESOURCE_CMS_PAGE = 'RESOURCE_CMS_PAGE';

    const RESOURCE_NAVIGATION = 'RESOURCE_NAVIGATION';

    const RESOURCE_GLOSSARY = 'RESOURCE_GLOSSARY';
    const RESOURCE_GLOSSARY_TRANSLATION = 'RESOURCE_GLOSSARY_TRANSLATION';

    const RESOURCE_PRODUCT = 'RESOURCE_PRODUCT';
    const RESOURCE_PRODUCT_CATEGORY = 'RESOURCE_PRODUCT_CATEGORY';
    const RESOURCE_PRODUCT_PRICE = 'RESOURCE_PRODUCT_PRICE';
    const RESOURCE_PRODUCT_SEARCH = 'RESOURCE_PRODUCT_SEARCH';
    const RESOURCE_PRODUCT_STOCK = 'RESOURCE_PRODUCT_STOCK';

    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/';
    }

}

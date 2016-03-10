<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Model\FacetConfig;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;

class CatalogFactory extends SprykerCatalogFactory
{

    /**
     * @return \Pyz\Client\Catalog\Model\FacetConfig
     */
    public function createFacetConfig()
    {
        return new FacetConfig();
    }

}

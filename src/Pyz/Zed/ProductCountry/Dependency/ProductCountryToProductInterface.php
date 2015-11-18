<?php

namespace Pyz\Zed\ProductCountry\Dependency;

use SprykerFeature\Zed\Product\Business\Exception\MissingProductException;

interface ProductCountryToProductInterface
{

    /**
     * @param string $sku
     *
     * @throws MissingProductException
     *
     * @return int
     */
    public function getAbstractProductIdBySku($sku);

}

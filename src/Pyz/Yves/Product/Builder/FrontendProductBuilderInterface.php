<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;

/**
 * Interface FrontendProductBuilderInterface
 */
interface FrontendProductBuilderInterface
{

    /**
     * @param array $productData
     *
     * @return ProductAbstract
     */
    public function buildProduct(array $productData);

}

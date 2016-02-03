<?php

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
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    public function buildProduct(array $productData);

}

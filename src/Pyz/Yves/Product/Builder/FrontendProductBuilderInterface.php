<?php

namespace Pyz\Yves\Product\Builder;

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

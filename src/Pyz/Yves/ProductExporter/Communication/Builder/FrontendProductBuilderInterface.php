<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\ProductExporter\Communication\Builder;

use Pyz\Yves\ProductExporter\Communication\Model\AbstractProduct;

/**
 * Interface FrontendProductBuilderInterface
 */
interface FrontendProductBuilderInterface
{

    /**
     * @param array $productData
     *
     * @return AbstractProduct
     */
    public function buildProduct(array $productData);

}

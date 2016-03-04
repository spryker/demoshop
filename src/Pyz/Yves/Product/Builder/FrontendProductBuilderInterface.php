<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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

<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;

interface AttributeVariantBuilderInterface
{
    /**
     * @param array $selectedAttributes
     * @param \Pyz\Yves\Product\Model\ProductAbstract $productAbstract
     *
     * @return ProductAbstract
     *
     */
    public function buildAttributeVariants(array $selectedAttributes, ProductAbstract $productAbstract);
}

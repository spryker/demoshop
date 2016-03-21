<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Pyz\Zed\ProductSearch\Business\Processor\ProductSearchProcessor;
use Spryker\Zed\ProductSearch\Business\ProductSearchBusinessFactory as SprykerProductSearchBusinessFactory;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @return \Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessorInterface
     */
    public function createProductSearchProcessor()
    {
        return new ProductSearchProcessor(
            $this->createKeyBuilder(),
            $this->getStoreName()
        );
    }

}

<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Product\Business;

use Pyz\Zed\Product\Business\Product\ProductUrlGenerator;
use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerProductBusinessFactory;

class ProductBusinessFactory extends SprykerProductBusinessFactory
{
    /**
     * @return \Spryker\Zed\Product\Business\Product\Url\ProductUrlGenerator
     */
    public function createProductUrlGenerator()
    {
        return new ProductUrlGenerator(
            $this->createProductAbstractNameGenerator(),
            $this->getLocaleFacade(),
            $this->getUtilTextService()
        );
    }
}

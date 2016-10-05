<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Product\Business;

use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerProductBusinessFactory;
use Pyz\Zed\Product\Business\Product\ProductUrlGenerator;

class ProductBusinessFactory extends SprykerProductBusinessFactory
{
    /**
     * @return \Spryker\Zed\Product\Business\Product\ProductUrlGenerator
     */
    public function createProductUrlGenerator()
    {
        return new ProductUrlGenerator($this->createProductManager());
    }
}

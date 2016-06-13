<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Product\Business;

use Pyz\Zed\Product\Business\Importer\Writer\Db\ProductConcreteWriter;
use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerProductBusinessFactory;

class ProductBusinessFactory extends SprykerProductBusinessFactory
{

    /**
     * @return \Spryker\Zed\Product\Business\Importer\Writer\ProductConcreteWriterInterface
     */
    protected function createProductConcreteWriter()
    {
        return new ProductConcreteWriter(
            $this->getCurrentLocale()
        );
    }

}

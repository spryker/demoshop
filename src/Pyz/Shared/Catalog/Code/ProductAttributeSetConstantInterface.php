<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Catalog\Code;

use Spryker\Shared\Catalog\Code\ProductAttributeSetConstantInterface as CoreProductAttributeSetConstantInterface;

interface ProductAttributeSetConstantInterface extends CoreProductAttributeSetConstantInterface
{

    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG = 'Products without Electronics Config';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE = 'Products without Electronics Simple';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE = 'Products without Electronics Single';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE = 'Products without Electronics Bundle';

}

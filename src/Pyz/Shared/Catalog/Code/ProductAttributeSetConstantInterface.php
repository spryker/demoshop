<?php

namespace Pyz\Shared\Catalog\Code;

use SprykerFeature\Shared\Catalog\Code\ProductAttributeSetConstantInterface as CoreProductAttributeSetConstantInterface;

interface ProductAttributeSetConstantInterface extends CoreProductAttributeSetConstantInterface
{

    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG = 'Products without Electronics Config';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE = 'Products without Electronics Simple';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE = 'Products without Electronics Single';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE = 'Products without Electronics Bundle';

}

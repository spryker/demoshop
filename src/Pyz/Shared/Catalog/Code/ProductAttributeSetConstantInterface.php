<?php
namespace Pyz\Shared\Catalog\Code;

use ProjectA\Shared\Catalog\Code\ProductAttributeSetConstantInterface as CoreProductAttributeSetConstantInterface;

interface ProductAttributeSetConstantInterface extends CoreProductAttributeSetConstantInterface
{
    const ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS = 'Products with Electronics';
    const ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS = 'Products without Electronics';
}

<?php
namespace Pyz\Shared\Catalog\Code;

use SprykerFeature\Shared\Catalog\Code\ProductAttributeConstantInterface as CoreProductAttributeConstantInterface;

interface ProductAttributeConstantInterface extends CoreProductAttributeConstantInterface
{
    const ATTRIBUTE_MANUFACTURER_DESCRIPTION = 'manufacturer_description';
    const ATTRIBUTE_COLOR = 'color';
    const ATTRIBUTE_CABLE_LENGTH = 'cable_length';
    const ATTRIBUTE_WIDTH = 'width';
    const ATTRIBUTE_HEIGHT = 'height';
    const ATTRIBUTE_DEPTH = 'depth';
    const ATTRIBUTE_MATERIAL = 'material';
    const ATTRIBUTE_WATT = 'watt';
    const ATTRIBUTE_SOCKET = 'socket';
}

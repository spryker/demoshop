<?php
namespace Pyz\Shared\Catalog\Code;

use ProjectA\Shared\Catalog\Code\ProductOptionTypeConstantInterface as CoreProductOptionTypeConstantInterface;

interface ProductOptionTypeConstantInterface extends CoreProductOptionTypeConstantInterface
{
    const OPTION_TYPE_ROOM_SERVICE = 'room_service';
}

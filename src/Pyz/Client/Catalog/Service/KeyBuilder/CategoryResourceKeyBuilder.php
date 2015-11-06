<?php

namespace Pyz\Client\Catalog\Service\KeyBuilder;

use SprykerFeature\Shared\Collector\Code\KeyBuilder\SharedResourceKeyBuilder;

class CategoryResourceKeyBuilder extends SharedResourceKeyBuilder
{
    /**
     * @return string
     */
    protected function getResourceType()
    {
        return 'categorynode';
    }
}

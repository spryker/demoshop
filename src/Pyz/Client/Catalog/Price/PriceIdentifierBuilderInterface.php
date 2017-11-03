<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Price;

interface PriceIdentifierBuilderInterface
{
    /**
     * @return string
     */
    public function buildIdentifier();
}

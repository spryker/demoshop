<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Offer;

use Spryker\Zed\Customer\Communication\Plugin\Offer\OfferCustomerHydratorPlugin;
use Spryker\Zed\Offer\OfferDependencyProvider as SprykerOfferDependencyProvider;

class OfferDependencyProvider extends SprykerOfferDependencyProvider
{
    /**
     * @return array
     */
    protected function getOfferHydratorPlugins(): array
    {
        return [
            new OfferCustomerHydratorPlugin(),
        ];
    }
}

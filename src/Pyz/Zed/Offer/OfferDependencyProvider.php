<?php

namespace Pyz\Zed\Offer;

use Spryker\Zed\Availability\Communication\Plugin\Offer\OfferQuoteItemStockHydratorPlugin;
use Spryker\Zed\Customer\Communication\Plugin\Offer\OfferCustomerHydratorPlugin;

class OfferDependencyProvider extends \Spryker\Zed\Offer\OfferDependencyProvider
{
    /**
     * @return array
     */
    protected function getOfferHydratorPlugins(): array
    {
        return [
            new OfferCustomerHydratorPlugin(),
            new OfferQuoteItemStockHydratorPlugin()
        ];
    }
}
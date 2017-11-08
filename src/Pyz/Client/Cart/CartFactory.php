<?php

namespace Pyz\Client\Cart;

use Pyz\Client\Customer\CustomerClient;
use Pyz\Client\Quote\QuoteClient;
use Spryker\Client\Cart\CartFactory as SprykerCartFactory;

class CartFactory extends SprykerCartFactory
{

    /**
     * @return QuoteClient
     */
    public function getQuoteClient()
    {
        return $this->getProvidedDependency(CartDependencyProvider::CLIENT_QUOTE);
    }

}

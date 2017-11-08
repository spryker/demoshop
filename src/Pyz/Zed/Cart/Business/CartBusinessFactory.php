<?php

namespace Pyz\Zed\Cart\Business;

use Pyz\Zed\Cart\CartDependencyProvider;
use Pyz\Zed\Quote\Business\QuoteFacade;
use Spryker\Zed\Cart\Business\CartBusinessFactory as SprykerCartBusinessFactory;

class CartBusinessFactory extends SprykerCartBusinessFactory
{

    /**
     * @return QuoteFacade
     */
    public function getQuoteFacade()
    {
        return $this->getProvidedDependency(CartDependencyProvider::FACADE_QUOTE);
    }

}
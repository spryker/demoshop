<?php

namespace Pyz\Client\Cart\Service;

use Generated\Client\Ide\FactoryAutoCompletion\CartService;
use SprykerFeature\Client\Cart\CartDependencyProvider;
use Pyz\Client\Cart\Service\Zed\CartStubInterface;
use SprykerFeature\Client\Cart\Service\CartDependencyContainer as SpyCartDependencyContainer;

/**
 * @method CartService getFactory()
 */
class CartDependencyContainer extends SpyCartDependencyContainer
{

    /**
     * @return CartStubInterface
     */
    public function createZedStub()
    {
        $zedStub = $this->getProvidedDependency(CartDependencyProvider::SERVICE_ZED);
        $cartStub = $this->getFactory()->createZedCartStub(
            $zedStub
        );

        return $cartStub;
    }


}

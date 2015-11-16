<?php

namespace Pyz\Client\Cart\Service;

use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Client\Cart\Service\CartClient as SpyCartClient;
use Generated\Shared\Transfer\ChangeTransfer;
use Pyz\Client\Cart\Service\Zed\CartStubInterface;
use Generated\Shared\Cart\CartInterface;

/**
 * @method CartDependencyContainer getDependencyContainer()
 */
class CartClient extends SpyCartClient
{
    /**
     * @param CountryTransfer $countryTransfer
     * @return CartInterface
     */
    public function addExpenseByCountryId(CountryTransfer $countryTransfer)
    {
        $changeTransfer = $this->createCartChange();
        $changeTransfer->setShipmentCountryId($countryTransfer->getIdCountry());
        $cartTransfer = $this->getZedStub()->addExpenseByCountryId($changeTransfer);

        return $this->handleCartResponse($cartTransfer);
    }

    /**
     * @return ChangeTransfer
     */
    protected function createCartChange()
    {
        $cartTransfer = $this->getCart();
        $changeTransfer = new ChangeTransfer();
        $changeTransfer->setCart($cartTransfer);

        return $changeTransfer;
    }

    /**
     * @return CartStubInterface
     */
    protected function getZedStub()
    {
        return $this->getDependencyContainer()->createZedStub();
    }
}

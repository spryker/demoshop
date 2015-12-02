<?php

namespace Pyz\Client\Cart\Service;

use Pyz\SprykerBugfixInterface;
use Generated\Shared\Cart\ItemInterface;
use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Client\Cart\Service\CartClient as SpyCartClient;
use Generated\Shared\Transfer\ChangeTransfer;
use Pyz\Client\Cart\Service\Zed\CartStubInterface;
use Generated\Shared\Cart\CartInterface;

/**
 * @method CartDependencyContainer getDependencyContainer()
 */
class CartClient extends SpyCartClient implements SprykerBugfixInterface
{
    /**
     * @param CountryTransfer $countryTransfer
     * @return CartInterface
     */
    public function addExpenseByCountry(CountryTransfer $countryTransfer)
    {
        $changeTransfer = $this->createCartChange();
        $changeTransfer->setShipmentCountryIso2($countryTransfer->getIso2Code());
        $cartTransfer = $this->getZedStub()->addExpenseByCountry($changeTransfer);

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

    /**
     * @param ItemInterface $itemTransfer
     * @param int $quantity
     *
     * @return CartInterface
     */
    public function changeItemQuantity(ItemInterface $itemTransfer, $quantity = 1)
    {
        //return parent::changeItemQuantity($itemTransfer, $quantity);

        if ($quantity === 0) {
            return $this->removeItem($itemTransfer);
        }

        $itemTransfer = $this->findItem($itemTransfer);

        $delta = abs($itemTransfer->getQuantity() - $quantity);

        if ($delta !== 0) {
            if( $itemTransfer->getQuantity() > $quantity) {
                return $this->decreaseItemQuantity($itemTransfer, $delta);
            } else {
                return $this->increaseItemQuantity($itemTransfer, $delta);
            }
        }
    }
}

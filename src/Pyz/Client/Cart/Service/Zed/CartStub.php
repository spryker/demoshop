<?php

namespace Pyz\Client\Cart\Service\Zed;

use Generated\Shared\Transfer\ChangeTransfer;
use SprykerFeature\Client\Cart\Service\Zed\CartStub as SpyCartStub;
use Generated\Shared\Cart\CartInterface;

class CartStub extends SpyCartStub implements CartStubInterface
{
    /**
     * @param ChangeTransfer $changeTransfer
     * @return CartInterface
     */
    public function addExpenseByCountry(ChangeTransfer $changeTransfer)
    {
        return $this->zedStub->call('/cart/gateway/add-expense-by-country', $changeTransfer);
    }
}

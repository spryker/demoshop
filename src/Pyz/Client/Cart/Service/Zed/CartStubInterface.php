<?php

namespace Pyz\Client\Cart\Service\Zed;

use Generated\Shared\Transfer\ChangeTransfer;
use Generated\Shared\Cart\CartInterface;

interface CartStubInterface
{
    /**
     * @param ChangeTransfer $changeTransfer
     * @return CartInterface
     */
    public function addExpenseByCountry(ChangeTransfer $changeTransfer);
}

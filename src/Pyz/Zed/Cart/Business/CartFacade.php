<?php

namespace Pyz\Zed\Cart\Business;

use Generated\Shared\Cart\ChangeInterface;
use SprykerFeature\Zed\Cart\Business\CartFacade as SpyCartFacade;
use Generated\Shared\Cart\CartInterface;
use Generated\Shared\Transfer\ExpenseTransfer;

/**
 * @method CartDependencyContainer getDependencyContainer()
 */
class CartFacade extends SpyCartFacade
{
    /**
     * @param ChangeInterface $cartChange
     *
     * @return CartInterface
     */
    public function addExpense(ChangeInterface $cartChange)
    {
        $addExpenseOperator = $this->getDependencyContainer()->createExpenseAddOperator();

        return $addExpenseOperator->executeOperation($cartChange);
    }

    /**
     * @param string $countryIso2
     * @return ExpenseTransfer
     */
    public function getShipmentMethodByCountryIso2($countryIso2)
    {
        return $this->getDependencyContainer()->getShipmentPlugin()->getShipmentMethodByCountryIso2($countryIso2);
    }

}

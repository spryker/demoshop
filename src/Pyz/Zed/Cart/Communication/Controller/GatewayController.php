<?php

namespace Pyz\Zed\Cart\Communication\Controller;

use Generated\Shared\Cart\ChangeInterface;
use Generated\Shared\Transfer\ChangeTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Zed\Cart\Communication\Controller\GatewayController as SpyGatewayController;
use Generated\Shared\Cart\CartInterface;
use Pyz\Zed\Cart\Business\CartFacade;

/**
 * @method CartFacade getFacade()
 */
class GatewayController extends SpyGatewayController
{

    /**
     * @param ChangeTransfer $changeTransfer
     * @return CartInterface
     */
    public function addExpenseByCountryAction(ChangeTransfer $changeTransfer)
    {
        $changeTransfer = $this->addShipmentMethodToTransfer($changeTransfer);

        return $this->getFacade()->addExpense($changeTransfer);
    }

    /**
     * @param ChangeTransfer $changeTransfer
     * @return ChangeTransfer
     */
    protected function addShipmentMethodToTransfer(ChangeTransfer $changeTransfer)
    {
        $shipmentMethod = $this->getFacade()->getShipmentMethodByCountryIso2($changeTransfer->getShipmentCountryIso2());
        $changeTransfer->addExpense($shipmentMethod);

        return $changeTransfer;
    }

}

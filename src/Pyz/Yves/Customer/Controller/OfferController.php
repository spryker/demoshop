<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\OfferToOrderConvertRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Shared\Offer\OfferConfig;
use Symfony\Component\HttpFoundation\Request;

class OfferController extends OrderController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function convertOfferAction(Request $request)
    {
        $offerId = $request->query->get('offerId');

        $offerToOrderConvertRequestTransfer = new OfferToOrderConvertRequestTransfer();
        $offerToOrderConvertRequestTransfer->setOrder(
            (new OrderTransfer())->setIdSalesOrder($offerId)
        );

        $response = $this->getFactory()
            ->getOfferClient()
            ->convertOfferToOrder($offerToOrderConvertRequestTransfer);

        if ($response->getIsSuccessful()) {
            $this->addSuccessMessage("customer.offer.convert.success");
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_OFFER);
        }

        $this->addErrorMessage("customer.offer.convert.failure");
        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_OFFER);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\OrderListTransfer
     */
    protected function createOrderListTransfer(Request $request)
    {
        $orderListTransfer = parent::createOrderListTransfer($request);
        $orderListTransfer->setType(OfferConfig::ORDER_TYPE_OFFER);

        return $orderListTransfer;
    }
}

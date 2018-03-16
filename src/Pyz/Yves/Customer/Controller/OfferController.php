<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Symfony\Component\HttpFoundation\Request;

class OfferController extends OrderController
{
    /**
     * @return array
     */
    public function convertOfferAction()
    {
        return [];
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\OrderListTransfer
     */
    protected function createOrderListTransfer(Request $request)
    {
        $orderListTransfer = parent::createOrderListTransfer($request);
        $orderListTransfer->setIsOffer(true);

        return $orderListTransfer;
    }
}

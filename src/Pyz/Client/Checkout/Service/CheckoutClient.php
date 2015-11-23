<?php

namespace Pyz\Client\Checkout\Service;

use Generated\Shared\Checkout\OrderInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient as SprykerFeatureCheckoutClient;

/**
 * @method CheckoutDependencyContainer getDependencyContainer()
 */
class CheckoutClient extends SprykerFeatureCheckoutClient implements CheckoutClientInterface
{

    /**
     * @return OrderInterface|null
     */
    public function getOrderSuccess()
    {
        $orderTransfer = $this->getDependencyContainer()
            ->createSessionOrderSuccessSession()
            ->getOrder()
        ;

        return $orderTransfer;
    }

    /**
     * @param OrderInterface $order
     *
     * @return OrderInterface|null
     */
    public function setOrderSuccess(OrderInterface $order = null)
    {
        $orderTransfer = $this->getDependencyContainer()
            ->createSessionOrderSuccessSession()
            ->setOrder($order)
        ;

        return $orderTransfer;
    }

    /**
     *
     */
    public function clearOrderSuccess()
    {
        $orderTransfer = $this->getDependencyContainer()
            ->createSessionOrderSuccessSession()
            ->clearOrder()
        ;

        return $orderTransfer;
    }

}

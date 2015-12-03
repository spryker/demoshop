<?php

namespace Pyz\Client\Checkout\Service\Session;

use Generated\Shared\Checkout\OrderInterface;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerFeature\Client\Session\Service\SessionClientInterface;

class OrderSuccessSession implements OrderSuccessSessionInterface
{

    const SESSION_KEY = 'order success data';

    /**
     * @var SessionClientInterface
     */
    protected $sessionClient;

    /**
     * @param SessionClientInterface $sessionClient
     */
    public function __construct(SessionClientInterface $sessionClient)
    {
        $this->sessionClient = $sessionClient;
    }

    /**
     * @return OrderInterface|null
     */
    public function getOrder()
    {
        return $this->sessionClient->get(self::SESSION_KEY);
    }

    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order)
    {
        $orderSuccess = $this->createOrderSuccess($order);

        $this->sessionClient->set(self::SESSION_KEY, $orderSuccess);
    }

    /**
     *
     */
    public function clearOrder()
    {
        $this->sessionClient->set(self::SESSION_KEY, null);
    }

    /**
     * @param OrderInterface $order
     *
     * @return OrderInterface
     */
    protected function createOrderSuccess(OrderInterface $order)
    {
        $orderSuccess = new OrderTransfer();
        $orderSuccess->setIdSalesOrder($order->getIdSalesOrder());
        $orderSuccess->setItems($order->getItems());
        $orderSuccess->setTotals($order->getTotals());
        $orderSuccess->setExpenses($order->getExpenses());
        $orderSuccess->setCustomer($order->getCustomer());

        return $orderSuccess;
    }

}

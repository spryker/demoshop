<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\OrderListTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Customer\CustomerFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @method CustomerFactory getFactory()
 * @method CustomerClientInterface getClient()
 */
class CustomerController extends AbstractCustomerController
{
    const ORDER_LIST_LIMIT = 5;
    const ORDER_LIST_SORT_FIELD = 'created_at';
    const ORDER_LIST_SORT_DIRECTION = 'DESC';

    const KEY_BILLING = 'billing';
    const KEY_SHIPPING = 'shipping';

    /**
     * @return array|RedirectResponse
     */
    public function indexAction()
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();
        $overviewRequest = $this->createOverviewRequest($customerTransfer);

        $overviewResponse = $this
            ->getClient()
            ->getCustomerOverview($overviewRequest);

        return $this->viewResponse([
            'customer' => $customerTransfer,
            'orderList' => $overviewResponse->getOrderList()->getOrders(),
            'addresses' => $this->getDefaultAddresses($customerTransfer),
            'isSubscribed' => $overviewResponse->getIsSubscribed(),
        ]);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerOverviewRequestTransfer
     */
    protected function createOverviewRequest(CustomerTransfer $customerTransfer)
    {
        $orderListTransfer = $this->createOrderListTransfer($customerTransfer);

        $overviewRequestTransfer = new CustomerOverviewRequestTransfer();
        $overviewRequestTransfer->setCustomer($customerTransfer);
        $overviewRequestTransfer->setOrderList($orderListTransfer);

        return $overviewRequestTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return OrderListTransfer
     */
    protected function createOrderListTransfer(CustomerTransfer $customerTransfer)
    {
        $filterTransfer = $this->createFilterTransfer();

        $orderListTransfer = new OrderListTransfer();
        $orderListTransfer->setIdCustomer($customerTransfer->getIdCustomer());
        $orderListTransfer->setFilter($filterTransfer);

        return $orderListTransfer;
    }

    /**
     * @return FilterTransfer
     */
    protected function createFilterTransfer()
    {
        $filterTransfer = new FilterTransfer();

        $filterTransfer->setLimit(self::ORDER_LIST_LIMIT);
        $filterTransfer->setOffset(0);
        $filterTransfer->setOrderBy(self::ORDER_LIST_SORT_FIELD);
        $filterTransfer->setOrderDirection(self::ORDER_LIST_SORT_DIRECTION);

        return $filterTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getDefaultAddresses(CustomerTransfer $customerTransfer)
    {
        $addresses = [];
        $addressItems = $customerTransfer->getAddresses()->getAddresses();
        foreach ($addressItems as $address) {
            if ($customerTransfer->getDefaultBillingAddress() === $address->getIdCustomerAddress()) {
                $addresses[self::KEY_BILLING] = $address;
            }

            if ($customerTransfer->getDefaultShippingAddress() === $address->getIdCustomerAddress()) {
                $addresses[self::KEY_SHIPPING] = $address;
            }
        }
        return $addresses;
    }

}

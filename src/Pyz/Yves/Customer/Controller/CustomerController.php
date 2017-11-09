<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\OrderListTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClientInterface getClient()
 */
class CustomerController extends AbstractCustomerController
{
    const ORDER_LIST_LIMIT = 5;
    const ORDER_LIST_SORT_FIELD = 'created_at';
    const ORDER_LIST_SORT_DIRECTION = 'DESC';

    const KEY_BILLING = 'billing';
    const KEY_SHIPPING = 'shipping';

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction()
    {
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();
        $customerTransfer = $this
            ->getClient()
            ->getCustomerByEmail($loggedInCustomerTransfer);

        if (!$customerTransfer->getIdCustomer()) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGOUT);
        }

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
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function adminAction()
    {
        return $this->viewResponse([

        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addCustomerAction(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCustomerAction(Request $request)
    {

    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewRequestTransfer
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
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\OrderListTransfer
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
     * @return \Generated\Shared\Transfer\FilterTransfer
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
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getDefaultAddresses(CustomerTransfer $customerTransfer)
    {
        $addressesTransfer = $customerTransfer->getAddresses();
        if ($addressesTransfer === null) {
            return [];
        }

        $addresses = [];
        foreach ($addressesTransfer->getAddresses() as $address) {
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

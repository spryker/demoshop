<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Generated\Shared\Transfer\CustomersTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerOrganizationRoleTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Zed\Customer\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \Pyz\Zed\Customer\Communication\CustomerCommunicationFactory getFactory()
 * @method \Pyz\Zed\Customer\Persistence\CustomerQueryContainer getQueryContainer()
 */
class GatewayController extends SprykerGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return \Generated\Shared\Transfer\CustomerOverviewResponseTransfer
     */
    public function getCustomerOverviewAction(CustomerOverviewRequestTransfer $overviewRequest)
    {
        $overviewResponseTransfer = new CustomerOverviewResponseTransfer();

        $orderListTransfer = $this->getOrderList($overviewRequest);
        $overviewResponseTransfer->setOrderList($orderListTransfer);

        $subscriptionResponseTransfer = $this->getIsSubscribed($overviewRequest->getCustomer());
        $overviewResponseTransfer->setIsSubscribed($subscriptionResponseTransfer->getSubscriptionResults()[0]->getIsSuccess());

        return $overviewResponseTransfer;
    }

    public function getCustomersInSameGroupAction(CustomerTransfer $customerTransfer)
    {
        $customers = $this->getQueryContainer()
            ->queryCustomers()
            ->useSpyCustomerGroupToCustomerQuery()
                    ->addJoin(
                    SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
                    SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
                    Criteria::LEFT_JOIN
                )
            ->filterByFkCustomerGroup($customerTransfer->getIdOrganization())
             ->endUse()
                ->withColumn(SpyCustomerOrganizationRoleTableMap::COL_ROLE, 'role')
                ->withColumn(SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_GROUP, 'idOrganization')
                ->find();

        $customersTransfer = new CustomersTransfer();
        foreach($customers as $customer) {
            $customerTransfer = (new CustomerTransfer())->fromArray($customer->toArray(), true);
            $customerTransfer->setOrganizationRole($customer->getRole());
            $customersTransfer->addCustomer($customerTransfer);
        }

        return $customersTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerOverviewRequestTransfer $overviewRequestTransfer
     *
     * @return \Generated\Shared\Transfer\OrderListTransfer
     */
    protected function getOrderList(CustomerOverviewRequestTransfer $overviewRequestTransfer)
    {
        $orderListTransfer = $this->getFactory()
            ->getSalesFacade()
            ->getCustomerOrders(
                $overviewRequestTransfer->getOrderList(),
                $overviewRequestTransfer->getCustomer()->getIdCustomer()
            );

        return $orderListTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer
     */
    protected function getIsSubscribed(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequestTransfer = new NewsletterSubscriptionRequestTransfer();

        $subscriberTransfer = new NewsletterSubscriberTransfer();
        $subscriberTransfer->setFkCustomer($customerTransfer->getIdCustomer());
        $subscriberTransfer->setEmail($customerTransfer->getEmail());
        $subscriptionRequestTransfer->setNewsletterSubscriber($subscriberTransfer);

        $newsletterTypeTransfer = new NewsletterTypeTransfer();
        $newsletterTypeTransfer->setName(NewsletterConstants::EDITORIAL_NEWSLETTER);

        $subscriptionRequestTransfer->addSubscriptionType($newsletterTypeTransfer);

        $subscriptionResponseTransfer = $this->getFactory()
            ->getNewsletterFacade()
            ->checkSubscription($subscriptionRequestTransfer);

        return $subscriptionResponseTransfer;
    }
}

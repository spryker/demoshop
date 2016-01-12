<?php

namespace Pyz\Zed\Customer\Communication\Controller;

use Generated\Shared\Transfer\CustomerOverviewRequestTransfer;
use Generated\Shared\Transfer\CustomerOverviewResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Generated\Shared\Transfer\OrderListTransfer;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Pyz\Zed\Customer\Communication\CustomerCommunicationFactory;
use Spryker\Zed\Customer\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method CustomerCommunicationFactory getFactory()
 */
class GatewayController extends SprykerGatewayController
{

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return CustomerOverviewResponseTransfer
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

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequestTransfer
     *
     * @return OrderListTransfer
     */
    protected function getOrderList(CustomerOverviewRequestTransfer $overviewRequestTransfer)
    {
        $orderListTransfer = $this->getFactory()
            ->getSalesFacade()
            ->getOrders($overviewRequestTransfer->getOrderList());

        return $orderListTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResponseTransfer
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

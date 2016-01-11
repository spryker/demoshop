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
        $overviewResponse = new CustomerOverviewResponseTransfer();

        $orderList = $this->getOrderList($overviewRequest);
        $overviewResponse->setOrderList($orderList);

        $subscriptionResponse = $this->getIsSubscribed($overviewRequest->getCustomer());
        $overviewResponse->setIsSubscribed($subscriptionResponse->getSubscriptionResults()[0]->getIsSuccess());

        return $overviewResponse;
    }

    /**
     * @param CustomerOverviewRequestTransfer $overviewRequest
     *
     * @return OrderListTransfer
     */
    protected function getOrderList(CustomerOverviewRequestTransfer $overviewRequest)
    {
        $orderList = $this->getFactory()
            ->getSalesFacade()
            ->getOrders($overviewRequest->getOrderList());

        return $orderList;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResponseTransfer
     */
    protected function getIsSubscribed(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequest = new NewsletterSubscriptionRequestTransfer();

        $subscriber = new NewsletterSubscriberTransfer();
        $subscriber->setFkCustomer($customerTransfer->getIdCustomer());
        $subscriber->setEmail($customerTransfer->getEmail());
        $subscriptionRequest->setNewsletterSubscriber($subscriber);

        $newsletterType = new NewsletterTypeTransfer();
        $newsletterType->setName(NewsletterConstants::EDITORIAL_NEWSLETTER);

        $subscriptionRequest->addSubscriptionType($newsletterType);

        $subscriptionResponse = $this->getFactory()
            ->getNewsletterFacade()
            ->checkSubscription($subscriptionRequest);

        return $subscriptionResponse;
    }

}

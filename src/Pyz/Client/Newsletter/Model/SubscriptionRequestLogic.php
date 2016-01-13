<?php

namespace Pyz\Client\Newsletter\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Pyz\Shared\Newsletter\NewsletterConstants;

class SubscriptionRequestLogic
{
    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionRequestTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @param string|null      $subscriberKey
     *
     * @return NewsletterSubscriptionRequestTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer, $subscriberKey);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionRequestTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @param string|null      $subscriberKey
     *
     * @return NewsletterSubscriptionRequestTransfer
     */
    protected function createNewsletterSubscriptionRequest(CustomerTransfer $customerTransfer, $subscriberKey = null)
    {
        $subscriptionRequest = new NewsletterSubscriptionRequestTransfer();

        $subscriber = new NewsletterSubscriberTransfer();
        $subscriber->setFkCustomer($customerTransfer->getIdCustomer());
        $subscriber->setEmail($customerTransfer->getEmail());
        $subscriber->setSubscriberKey($subscriberKey);

        $subscriptionRequest->setNewsletterSubscriber($subscriber);

        return $subscriptionRequest;
    }

    /**
     * @param NewsletterSubscriptionRequestTransfer $subscriptionRequest
     *
     * @return void
     */
    protected function addEditorialNewsletterType(NewsletterSubscriptionRequestTransfer $subscriptionRequest)
    {
        $newsletterType = new NewsletterTypeTransfer();
        $newsletterType->setName(NewsletterConstants::EDITORIAL_NEWSLETTER);

        $subscriptionRequest->addSubscriptionType($newsletterType);
    }

}

<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Newsletter\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Pyz\Shared\Newsletter\NewsletterConstants;

class SubscriptionRequestLogic
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer, $subscriberKey);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer)
    {
        $subscriptionRequest = $this->createNewsletterSubscriptionRequest($customerTransfer);

        $this->addEditorialNewsletterType($subscriptionRequest);

        return $subscriptionRequest;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer
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
     * @param \Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer $subscriptionRequest
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

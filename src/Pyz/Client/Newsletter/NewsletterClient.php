<?php

namespace Pyz\Client\Newsletter;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer;
use Spryker\Client\Newsletter\NewsletterClient as SprykerNewsletterClient;

/**
 * @method NewsletterFactory getFactory()
 */
class NewsletterClient extends SprykerNewsletterClient implements NewsletterClientInterface
{

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResultTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer)
    {
        $request = $this->getFactory()
            ->createSubscriptionRequestLogic()
            ->subscribeForEditorialNewsletter($customerTransfer);

        $subscriptionResponse = $this->subscribeWithDoubleOptIn($request);

        return $subscriptionResponse->getSubscriptionResults()[0];
    }

    /**
     * @param CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return NewsletterSubscriptionResultTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null)
    {
        $request = $this->getFactory()
            ->createSubscriptionRequestLogic()
            ->unsubscribeFromAllNewsletters($customerTransfer, $subscriberKey);

        return $this->unsubscribe($request);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResultTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer)
    {
        $request = $this->getFactory()
            ->createSubscriptionRequestLogic()
            ->checkEditorialNewsletterSubscription($customerTransfer);

        $subscriptionResponse = $this->checkSubscription($request);

        return $subscriptionResponse->getSubscriptionResults()[0];
    }

}

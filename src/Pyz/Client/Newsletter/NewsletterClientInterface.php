<?php

namespace Pyz\Client\Newsletter;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer;
use Spryker\Client\Newsletter\NewsletterClientInterface as SprykerNewsletterClientInterface;

interface NewsletterClientInterface extends SprykerNewsletterClientInterface
{

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResultTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer);

    /**
     * @param CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return NewsletterSubscriptionResponseTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null);

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return NewsletterSubscriptionResultTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer);

}

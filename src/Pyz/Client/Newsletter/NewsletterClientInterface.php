<?php

namespace Pyz\Client\Newsletter;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer;
use Spryker\Client\Newsletter\NewsletterClientInterface as SprykerNewsletterClientInterface;

interface NewsletterClientInterface extends SprykerNewsletterClientInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer);

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null);

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer);

}

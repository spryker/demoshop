<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Newsletter;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Newsletter\NewsletterClientInterface as SprykerNewsletterClientInterface;

interface NewsletterClientInterface extends SprykerNewsletterClientInterface
{

    /**
     * Specification:
     * - Subscribes a Customer to editorial Newsletter.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer
     */
    public function subscribeForEditorialNewsletter(CustomerTransfer $customerTransfer);

    /**
     * Specification:
     * - Unsubscribes a Customer to editorial Newsletter.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param string|null $subscriberKey
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer
     */
    public function unsubscribeFromAllNewsletters(CustomerTransfer $customerTransfer, $subscriberKey = null);

    /**
     * Specification:
     * - Checks a editorial Newsletter subscription.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer
     */
    public function checkEditorialNewsletterSubscription(CustomerTransfer $customerTransfer);

}

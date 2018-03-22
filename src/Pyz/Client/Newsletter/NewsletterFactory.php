<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Newsletter;

use Pyz\Client\Newsletter\Model\SubscriptionRequestLogic;
use Spryker\Client\Newsletter\NewsletterFactory as SprykerNewsletterFactory;

class NewsletterFactory extends SprykerNewsletterFactory
{
    /**
     * @return \Pyz\Client\Newsletter\Model\SubscriptionRequestLogic
     */
    public function createSubscriptionRequestLogic()
    {
        return new SubscriptionRequestLogic();
    }
}

<?php

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

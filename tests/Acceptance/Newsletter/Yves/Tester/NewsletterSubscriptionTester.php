<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Newsletter\Yves\Tester;

use Orm\Zed\Newsletter\Persistence\SpyNewsletterSubscriber;
use Orm\Zed\Newsletter\Persistence\SpyNewsletterSubscription;
use Orm\Zed\Newsletter\Persistence\SpyNewsletterTypeQuery;
use YvesAcceptanceTester;

class NewsletterSubscriptionTester extends YvesAcceptanceTester
{

    /**
     * @param string $email
     *
     * @return void
     */
    public function haveAnAlreadySubscribedEmail($email)
    {
        $newsletterSubscriberEntity = new SpyNewsletterSubscriber();
        $newsletterSubscriberEntity
            ->setEmail($email)
            ->save();

        $newsletterTypeEntity = SpyNewsletterTypeQuery::create()
            ->findOneByName('EDITORIAL_NEWSLETTER');

        $newsletterSubscriptionEntity = new SpyNewsletterSubscription();
        $newsletterSubscriptionEntity
            ->setSpyNewsletterType($newsletterTypeEntity)
            ->setSpyNewsletterSubscriber($newsletterSubscriberEntity)
            ->save();
    }

}

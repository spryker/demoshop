<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Newsletter;

use Codeception\Actor;
use Codeception\Scenario;
use Orm\Zed\Newsletter\Persistence\SpyNewsletterSubscriber;
use Orm\Zed\Newsletter\Persistence\SpyNewsletterSubscription;
use Orm\Zed\Newsletter\Persistence\SpyNewsletterTypeQuery;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class NewsletterPresentationTester extends Actor
{
    use _generated\NewsletterPresentationTesterActions;

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->amYves();
    }

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

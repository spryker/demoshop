<?php

namespace Pyz\Yves\Newsletter\Communication\Plugin;

use SprykerCore\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class NewsletterControllerProvider extends YvesControllerProvider
{

    const ROUTE_NEWSLETTER_SUBSCRIPTION = 'subscribe';
    const ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION = 'confirm/subscription';
    const ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_SUCCESS = 'subscription/confirmed';
    const ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_FAILURE = 'subscription/not/confirmed';
    const ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION = 'unsubscribe';
    const ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_SUCCESS = 'subscription/cancelled';
    const ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_FAILURE = 'subscription/not/cancelled';

    /**
     * {@inheritdoc }
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/subscribe', self::ROUTE_NEWSLETTER_SUBSCRIPTION, 'Newsletter', 'Newsletter', 'subscribe');
        $this->createController('/confirm-subscription', self::ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION, 'Newsletter', 'Newsletter', 'confirmSubscription');
        $this->createController('/subscription-confirmed', self::ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_SUCCESS, 'Newsletter', 'Newsletter', 'subscriptionConfirmed');
        $this->createController('/subscription-not-confirmed', self::ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_FAILURE, 'Newsletter', 'Newsletter', 'subscriptionNotConfirmed');
        $this->createController('/unsubscribe', self::ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION, 'Newsletter', 'Newsletter', 'unsubscribe');
        $this->createController('/subscription-cancelled', self::ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_SUCCESS, 'Newsletter', 'Newsletter', 'subscriptionCancelled');
        $this->createController('/subscription-not-cancelled', self::ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_FAILURE, 'Newsletter', 'Newsletter', 'subscriptionNotCancelled');
    }

}
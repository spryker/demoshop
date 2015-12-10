<?php

namespace Pyz\Yves\Newsletter\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class NewsletterControllerProvider extends YvesControllerProvider
{

    const NEWSLETTER_SUBSCRIPTION_ROUTE = 'NEWSLETTER_SUBSCRIPTION_ROUTE';
    const NEWSLETTER_LANDING_PAGE_ROUTE = 'NEWSLETTER_LANDING_PAGE_ROUTE';
    const NEWSLETTER_UNSUBSCRIPTION_ROUTE = 'NEWSLETTER_UNSUBSCRIPTION_ROUTE';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createPostController(
            '/newsletter/subscribe/',
            static::NEWSLETTER_SUBSCRIPTION_ROUTE,
            'Newsletter',
            'Subscription'
        )->method('POST');

        $this->createPostController(
            '/newsletter/confirmation/{subscriberKey}', //please no trailing slash here
            static::NEWSLETTER_LANDING_PAGE_ROUTE,
            'Newsletter',
            'Landingpage'
        )->method('GET')->assert('subscriberKey', '[0-9A-Fa-f]+');

        $this->createPostController(
            '/newsletter/unsubscribe/{subscriberKey}/newsletter-type/{newsletterTypeName}', //please no trailing slash here
            static::NEWSLETTER_UNSUBSCRIPTION_ROUTE,
            'Newsletter',
            'Unsubscription'
        )->method('GET')->assert('subscriberKey', '[0-9A-Fa-f]+')
        ->assert('newsletterTypeName','[A-Za-z0-9-_]+');
    }
}

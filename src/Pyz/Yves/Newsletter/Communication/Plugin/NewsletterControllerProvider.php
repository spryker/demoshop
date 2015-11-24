<?php

namespace Pyz\Yves\Newsletter\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class NewsletterControllerProvider extends YvesControllerProvider
{

    const NEWSLETTER_SUBSCRIPTION_ROUTE = 'NEWSLETTER_SUBSCRIPTION_ROUTE';
    const NEWSLETTER_LANDING_PAGE_ROUTE = 'NEWSLETTER_LANDING_PAGE_ROUTE';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createPostController(
            '/newsletter/subscribe',
            static::NEWSLETTER_SUBSCRIPTION_ROUTE,
            'Newsletter',
            'Subscription'
        )->method('POST');

        $this->createPostController(
            '/newsletter/confirmation',
            static::NEWSLETTER_LANDING_PAGE_ROUTE,
            'Newsletter',
            'Landingpage'
        )->method('GET');
    }
}

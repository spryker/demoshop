<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Newsletter\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class NewsletterControllerProvider extends AbstractYvesControllerProvider
{
    const ROUTE_NEWSLETTER_SUBSCRIBE = 'newsletter/subscribe';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{newsletter}/subscribe', self::ROUTE_NEWSLETTER_SUBSCRIBE, 'Newsletter', 'Subscription', 'subscribe')
            ->assert('newsletter', $allowedLocalesPattern . 'newsletter|newsletter')
            ->value('newsletter', 'newsletter');
    }
}

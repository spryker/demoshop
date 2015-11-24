<?php

namespace Pyz\Zed\Newsletter;

use SprykerFeature\Zed\Newsletter\NewsletterDependencyProvider as SprykerNewsletterDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class NewsletterDependencyProvider extends SprykerNewsletterDependencyProvider
{

    /**
     * @param Container $container
     * @return array
     */
    protected function getDoubleOptInSenderPlugins(Container $container)
    {
        return [
            $container->getLocator()->newsletterDoiMailQueueConnector()->facade()
        ];
    }
}

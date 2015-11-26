<?php

namespace Pyz\Zed\MailchimpNewsletterCustomerPlugin;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class MailchimpNewsletterCustomerPluginDependencyProvider extends AbstractBundleDependencyProvider
{
    const CUSTOMER_QUERY_CONTAINER = 'CUSTOMER_QUERY_CONTAINER';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::CUSTOMER_QUERY_CONTAINER] = function(Container $container) {
            return $container->getLocator()->customer()->queryContainer();
        };
        return $container;
    }
}

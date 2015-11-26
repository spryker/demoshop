<?php

namespace Pyz\Zed\MailchimpNewsletter;

use PavFeature\Zed\MailchimpNewsletter\MailchimpNewsletterDependencyProvider as PavMailchimpNewsletterDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class MailchimpNewsletterDependencyProvider extends PavMailchimpNewsletterDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container[self::MERGE_VARIABLE_PROVIDERS] = function(Container $container) {
            return [
                $container->getLocator()->mailchimpNewsletterCustomerPlugin()->facade()
            ];
        };
        return $container;
    }

}

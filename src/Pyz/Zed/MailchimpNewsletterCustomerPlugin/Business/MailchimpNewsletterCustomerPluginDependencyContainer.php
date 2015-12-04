<?php

namespace Pyz\Zed\MailchimpNewsletterCustomerPlugin\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Pyz\Zed\MailchimpNewsletterCustomerPlugin\MailchimpNewsletterCustomerPluginDependencyProvider;

class MailchimpNewsletterCustomerPluginDependencyContainer extends AbstractBusinessDependencyContainer
{
    /**
     * @param string $email
     * @return mixed
     * @throws \ErrorException
     */
    public function getMergeVariableProvider($email)
    {
        return $this->getFactory()->createProvidersMergeVariableProvider(
            $this->getProvidedDependency(MailchimpNewsletterCustomerPluginDependencyProvider::CUSTOMER_QUERY_CONTAINER),
            $email
        );
    }
}

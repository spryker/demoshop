<?php

namespace Pyz\Zed\MailchimpNewsletterCustomerPlugin\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use PavFeature\Zed\MailchimpNewsletterCustomerPlugin\Business\Providers\MergeVariableProvider;

class MailchimpNewsletterCustomerPluginFacade extends AbstractFacade
{
    /**
     * @return MergeVariableProvider
     */
    public function getMergeVars($email)
    {
        return $this->getDependencyContainer()
            ->getMergeVariableProvider($email)
            ->getMergeVars();
    }
}

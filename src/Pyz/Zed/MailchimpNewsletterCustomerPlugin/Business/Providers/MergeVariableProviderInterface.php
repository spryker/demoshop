<?php

namespace Pyz\Zed\MailchimpNewsletterCustomerPlugin\Business\Providers;


interface MergeVariableProviderInterface
{
    /**
     * @return array
     */
    public function getMergeVars();
}

<?php

namespace Pyz\Zed\Customer\Communication;

use Pyz\Zed\Customer\CustomerDependencyProvider;
use Spryker\Zed\Customer\Communication\CustomerCommunicationFactory as SprykerCustomerCommunicationFactory;
use Spryker\Zed\Newsletter\Business\NewsletterFacade;
use Spryker\Zed\Sales\Business\SalesFacade;

class CustomerCommunicationFactory extends SprykerCustomerCommunicationFactory
{

    /**
     * @return \Spryker\Zed\Sales\Business\SalesFacade
     */
    public function getSalesFacade()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::SALES_FACADE);
    }

    /**
     * @return \Spryker\Zed\Newsletter\Business\NewsletterFacade
     */
    public function getNewsletterFacade()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::NEWSLETTER_FACADE);
    }

}

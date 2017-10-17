<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Customer\Communication;

use Pyz\Zed\Customer\CustomerDependencyProvider;
use Spryker\Zed\Customer\Communication\CustomerCommunicationFactory as SprykerCustomerCommunicationFactory;

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

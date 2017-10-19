<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Customer;

use Codeception\Test\Unit;
use Pyz\Client\Newsletter\NewsletterClientInterface;
use Pyz\Yves\Customer\CustomerFactory;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Customer
 * @group CustomerFactoryTest
 * Add your own group annotations below this line
 */
class CustomerFactoryTest extends Unit
{
    /**
     * @return void
     */
    public function testGetNewsletterClient()
    {
        $customerFactory = new CustomerFactory();

        $this->assertInstanceOf(NewsletterClientInterface::class, $customerFactory->getNewsletterClient());
    }
}

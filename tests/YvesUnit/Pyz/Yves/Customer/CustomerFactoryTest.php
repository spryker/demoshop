<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Customer;

use PHPUnit_Framework_TestCase;
use Pyz\Client\Newsletter\NewsletterClientInterface;
use Pyz\Yves\Customer\CustomerFactory;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Customer
 * @group CustomerFactoryTest
 */
class CustomerFactoryTest extends PHPUnit_Framework_TestCase
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

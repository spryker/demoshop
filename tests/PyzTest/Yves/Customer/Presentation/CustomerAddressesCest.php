<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Presentation;

use PyzTest\Yves\Customer\CustomerPresentationTester;
use PyzTest\Yves\Customer\PageObject\CustomerAddressesPage;
use PyzTest\Yves\Customer\PageObject\CustomerAddressPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Presentation
 * @group CustomerAddressesCest
 * Add your own group annotations below this line
 */
class CustomerAddressesCest
{
    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenAddAddressPage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerAddressesPage::URL);
        $i->click(CustomerAddressesPage::ADD_ADDRESS_LINK);
        $i->seeCurrentUrlEquals(CustomerAddressPage::URL);
    }
}

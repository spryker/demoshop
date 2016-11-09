<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerAddressesPage;
use Acceptance\Customer\Yves\PageObject\CustomerAddressPage;
use Acceptance\Customer\Yves\Tester\CustomerAddressesTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerAddressesCest
 */
class CustomerAddressesCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerAddressesTester $i
     *
     * @return void
     */
    public function testICanOpenAddAddressPage(CustomerAddressesTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerAddressesPage::URL);
        $i->click(CustomerAddressesPage::ADD_ADDRESS_LINK);
        $i->seeCurrentUrlEquals(CustomerAddressPage::URL);
    }

}

<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves\Tester;

use Acceptance\Customer\Yves\PageObject\CustomerLoginPage;

class CustomerLoginTester extends CustomerTester
{

    /**
     * @return void
     */
    public function submitLoginForm()
    {
        $i = $this;
        $customerTransfer = CustomerLoginPage::getCustomerData(CustomerLoginPage::NEW_CUSTOMER_EMAIL);

        $i->submitForm(['name' => 'loginForm'], [
            CustomerLoginPage::FORM_FIELD_SELECTOR_EMAIL => $customerTransfer->getEmail(),
            CustomerLoginPage::FORM_FIELD_SELECTOR_PASSWORD => $customerTransfer->getPassword(),
        ]);
    }

}

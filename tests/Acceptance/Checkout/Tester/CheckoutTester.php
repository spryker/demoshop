<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Checkout\Tester;

use YvesAcceptanceTester;

class CheckoutTester extends YvesAcceptanceTester
{

    /**
     * @return $this
     */
    public function processCustomerStep()
    {
        $this->see('Create account');

        $this->fillField('//*[@id="registerForm_customer_first_name"]', 'first-name-test' . rand(100, 999));
        $this->fillField('//*[@id="registerForm_customer_last_name"]', 'last-name-test' . rand(100, 999));
        $this->fillField('//*[@id="registerForm_customer_email"]', 'email-test@domain-' . rand(100, 999) . '.tld');
        $this->fillField('//*[@id="registerForm_customer_password_pass"]', 'as');
        $this->fillField('//*[@id="registerForm_customer_password_confirm"]', 'as');
        $this->click('//*[@id="registerForm_customer_accept_terms"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function clickRegisterButton()
    {
        $this->click('/html/body/div[2]/main/div/div[1]/div[3]/form/div/div/button');

        return $this;
    }

    /**
     * @return $this
     */
    public function processAddressStep()
    {
        $this->see('Shipping Address');

        $this->fillField('//*[@id="addressesForm_shippingAddress_first_name"]', 'first-name-test' . rand(100, 999));
        $this->fillField('//*[@id="addressesForm_shippingAddress_last_name"]', 'last-name-test' . rand(100, 999));
        $this->fillField('//*[@id="addressesForm_shippingAddress_company"]', 'company-test' . rand(100, 999));
        $this->fillField('//*[@id="addressesForm_shippingAddress_phone"]', '123456789');
        $this->fillField('//*[@id="addressesForm_shippingAddress_address1"]', 'address1');
        $this->fillField('//*[@id="addressesForm_shippingAddress_address2"]', '15');
        $this->fillField('//*[@id="addressesForm_shippingAddress_address3"]', 'address3');
        $this->fillField('//*[@id="addressesForm_shippingAddress_zip_code"]', '10405');
        $this->fillField('//*[@id="addressesForm_shippingAddress_city"]', 'city');

        return $this;
    }

    /**
     * @return $this
     */
    public function processShipmentStep()
    {
        $this->see('Shipment');

        $this->click('//*[@id="shipmentForm_idShipmentMethod_1"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function processOverviewStep()
    {
        $this->see('Overview');

        return $this;
    }

    /**
     * @return $this
     */
    public function processSuccessStep()
    {
        $this->see('Your order has been placed successfully!');

        return $this;
    }

    /**
     * @return $this
     */
    public function processPaymentStep()
    {
        $this->see('Payment');

        $this->click('//*[@id="paymentForm_paymentSelection_1"]');
        $this->fillField('//*[@id="paymentForm_dummyPaymentInvoice_date_of_birth"]', '01.07.1985');

        return $this;
    }

    /**
     * @return $this
     */
    public function nextStep()
    {
        $this->click('//*[contains(@class, "success")]');

        return $this;
    }

    /**
     * @return $this
     */
    public function processAllCheckoutSteps()
    {
        $this->processCustomerStep()
            ->clickRegisterButton()
            ->processAddressStep()
            ->nextStep()
            ->processShipmentStep()
            ->nextStep()
            ->processPaymentStep()
            ->nextStep()
            ->processOverviewStep()
            ->nextStep()
            ->processSuccessStep();

        return $this;
    }

}

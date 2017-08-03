<?php

namespace PyzTest\Yves\Checkout\Helper;

use Codeception\Module;

class CheckoutHelper extends Module
{

    /**
     * @return \Codeception\Module|\Codeception\Module\WebDriver
     */
    protected function getWebDriver()
    {
        return $this->getModule('WebDriver');
    }

    /**
     * @return $this
     */
    public function processCustomerStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Create account');

        $tester->fillField('//*[@id="registerForm_customer_first_name"]', 'first-name-test' . rand(100, 999));
        $tester->fillField('//*[@id="registerForm_customer_last_name"]', 'last-name-test' . rand(100, 999));
        $tester->fillField('//*[@id="registerForm_customer_email"]', 'email-test@domain-' . rand(100, 999) . '.tld');
        $tester->fillField('//*[@id="registerForm_customer_password_pass"]', 'as');
        $tester->fillField('//*[@id="registerForm_customer_password_confirm"]', 'as');
        $tester->click('//*[@id="registerForm_customer_accept_terms"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function clickRegisterButton()
    {
        $tester = $this->getWebDriver();
        $tester->click('/html/body/div[2]/main/div/div[1]/div[3]/form/div/div/button');

        return $this;
    }

    /**
     * @return $this
     */
    public function processAddressStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Shipping Address');

        $tester->fillField('//*[@id="addressesForm_shippingAddress_first_name"]', 'first-name-test' . rand(100, 999));
        $tester->fillField('//*[@id="addressesForm_shippingAddress_last_name"]', 'last-name-test' . rand(100, 999));
        $tester->fillField('//*[@id="addressesForm_shippingAddress_company"]', 'company-test' . rand(100, 999));
        $tester->fillField('//*[@id="addressesForm_shippingAddress_phone"]', '123456789');
        $tester->fillField('//*[@id="addressesForm_shippingAddress_address1"]', 'address1');
        $tester->fillField('//*[@id="addressesForm_shippingAddress_address2"]', '15');
        $tester->fillField('//*[@id="addressesForm_shippingAddress_address3"]', 'address3');
        $tester->fillField('//*[@id="addressesForm_shippingAddress_zip_code"]', '10405');
        $tester->fillField('//*[@id="addressesForm_shippingAddress_city"]', 'city');

        return $this;
    }

    /**
     * @return $this
     */
    public function processShipmentStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Shipment');

        $tester->click('//*[@id="shipmentForm_idShipmentMethod_1"]');

        return $this;
    }

    /**
     * @return $this
     */
    public function processOverviewStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Overview');

        return $this;
    }

    /**
     * @return $this
     */
    public function processSuccessStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Your order has been placed successfully!');

        return $this;
    }

    /**
     * @return $this
     */
    public function processPaymentStep()
    {
        $tester = $this->getWebDriver();
        $tester->see('Payment');

        $tester->click('//*[@id="paymentForm_paymentSelection_1"]');
        $tester->fillField('//*[@id="paymentForm_dummyPaymentInvoice_date_of_birth"]', '01.07.1985');

        return $this;
    }

    /**
     * @return $this
     */
    public function nextStep()
    {
        $tester = $this->getWebDriver();
        $tester->click('//*[contains(@class, "success")]');

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

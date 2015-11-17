<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Acceptance\Pyz\Yves\Checkout\Payolution;

use Codeception\TestCase\Test;
use Pyz\WebGuy;

class PayolutionTest extends Test
{

    public function testCheckout()
    {
        $this->markTestSkipped('Skipped this test as it requires PhantomJS to be installed. This could be un-skipped when PhantomJS is added to the VM so everyone can run the integration check.');

        $i = new WebGuy($this->getScenario());
        $i->wantTo('View product details');
        $i->amOnPage('/');
        $i->click('Gorilla Männchen');
        $i->seeCurrentUrlEquals('/gorilla-maennchen');
        $i->see('In den Warenkorb');

        $i->wantTo('Add product to cart');
        $i->click('In den Warenkorb');
        $i->waitForElementVisible('//*[@id="cart-overlay"]/a[@class="cart__to-checkout cta"]', 10);
        $i->see('Zur Kasse');

        $i->wantTo('Go to checkout');
        $i->click('Zur Kasse');
        $i->seeCurrentUrlEquals('/checkout');
        $i->see('Deine Bestellung');
        $i->see('Ich bin bereits Kunde');

        $i->wantTo('Fill out checkout form');
        $i->click('button.login__skip');
        // Customer data
        $i->fillField('#checkout_email', 'john@doe.com');
        $i->fillField('#checkout_billing_address_first_name', 'John');
        $i->fillField('#checkout_billing_address_last_name', 'Doe');
        $i->fillField('#checkout_billing_address_street', 'Julie-Wolfthorn-Straße');
        $i->fillField('#checkout_billing_address_street_nr', '1');
        $i->fillField('#checkout_billing_address_zip_code', '10115');
        $i->fillField('#checkout_billing_address_city', 'Berlin');
        $i->click('button.js-address-button');
        // Payment data
        $i->selectOption('input[name="checkout[payment_method]"]', 'invoice');
        $i->canSeeElement('#checkout_payolution_payment');
        $i->fillField('#checkout_payolution_payment_address_first_name', 'John');
        $i->fillField('#checkout_payolution_payment_address_last_name', 'Doe');
        $i->fillField('#checkout_payolution_payment_address_street', 'Julie-Wolfthorn-Straße');
        $i->fillField('#checkout_payolution_payment_address_street_nr', '1');
        $i->fillField('#checkout_payolution_payment_address_zip_code', '10115');
        $i->fillField('#checkout_payolution_payment_address_city', 'Berlin');
        $i->selectOption('input[name="checkout[payolution_payment][gender]"]', 'Mr');
        $i->fillField('#checkout_payolution_payment_date_of_birth', '01.01.1970');
        $i->fillField('#checkout_payolution_payment_email', 'john@doe.com');
        $i->fillField('#checkout_payolution_payment_address_phone', '+49 30 08150815');
        $i->click('button.js-payment-button');
        // Shipment data
        $i->selectOption('input[name="checkout[id_shipment_method]"]', '1');
        $i->click('button.js-shipment-button');

        $i->wantTo('Finalize checkout / send cart');
        $i->checkOption('#checkout_terms');
        $i->seeElement('.confirm__agb-submit');
        $i->submitForm('form[name="checkout"]', []);
        $i->wait(15);

        $i->wantTo('Check for checkout success');
        $i->seeCurrentUrlEquals('/checkout/success');
        $i->see('Danke');
    }

}

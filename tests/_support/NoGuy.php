<?php

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class NoGuy extends \Codeception\Actor
{
    use _generated\NoGuyActions;

    private $testName;
    private $createScreenshots = false;

    public function setTestName($name) {

        $this->testName = $name;
    }

    public function activateScreenshots($bool) {

        $this->createScreenshots = $bool;
    }

    public function createScreenshot($name) {

        if(!$this->createScreenshots) {

            return;
        }

        $filename = sprintf('%s__%s', $this->testName, $name);

        $this->makeScreenshot($filename);
    }

    public function verifyHome() {

        $this->amOnPage('/');
        $this->createScreenshot('home');
        $this->see('Alle Zutaten und Produkte von uns besitzen Lebensmittelqualität, um ihnen das Höchstmaß an Qualität bieten zu können.', 'div');
    }

    public function openDogsProductDetailPage() {

        $this->click('Hunde', '.navbar__link');
        $this->createScreenshot('dogs');

        // Product Overview Page
        $this->click('Basisnahrung');
        $this->see('PETS DELI Menübox für Hunde Weißfischfilet');
        $this->createScreenshot('dogs_overview');

        // Product Detail Page
        $this->click(['xpath' => '//a[@class="product-card__inner"]']);
        $this->seeInTitle('PETS DELI Menübox für Hunde Weißfischfilet');
        $this->createScreenshot('dogs_detail');
    }

    public function openCatsProductDetailPage() {

        $this->click('Katzen', '.navbar__link');
        $this->createScreenshot('cats');

        // Product Overview Page
        $this->click('Basisnahrung');
        $this->see('PETS DELI Menübox für Katzen Hühnerbrustfilet');
        $this->createScreenshot('cats_basisnahrung');

        // Product Detail Page
        $this->click(['xpath' => '//a[@class="product-card__inner"]']);
        $this->seeInTitle('PETS DELI Menübox für Katzen Hühnerbrustfilet ');
        $this->createScreenshot('cats_detail');
    }

    public function addItemToBasket($amount = 1) {

        $this->fillField('#quantity', $amount);

        $pricePerUnit = $this->cleanupPrice($this->grabTextFrom('.product-options__total'));
        $priceTotal   = $amount * $pricePerUnit;

        $this->click('In den Warenkorb');
        $this->createScreenshot('add2basket');

        return $priceTotal;
    }

    public function doCustomerCheckout($expectedPrice) {

        // Open basket
        $this->click('Warenkorb');
        $this->createScreenshot('basket');
        $this->see('Gesamtbetrag', '.cart-layer__total');
        $this->see('2,00 €');

        // Checkout
        $this->click('Weiter zur Kasse');
        $this->createScreenshot('checkout');
        $this->fillField('#user_email',    'florian.preusner@project-a.com');
        $this->fillField('#user_password', 'mate20mg');
        $this->createScreenshot('checkout_after_fill');

        $this->click('Einloggen');
        $this->createScreenshot('checkout_login');

        // should be relevant in the future
        // Address
        $this->fillField('#checkout_billing_address_first_name',    'Max');
        $this->fillField('#checkout_billing_address_last_name',     'Mustermann');
        $this->fillField('#checkout_billing_address_street',        'Julie-Wolfthorn-Straße');
        $this->fillField('#checkout_billing_address_street_nr',     '1');
        $this->fillField('#checkout_billing_address_address-line3', '');
        $this->fillField('#checkout_billing_address_zip_code',      '10115');
        $this->fillField('#checkout_billing_address_city',          'Berlin');
        $this->fillField('#checkout_billing_address_iso2code',      'DE');

        $this->click('Weiter zu Zahlrtarten');
        $this->createScreenshot('checkout_payment');

        $this->payWithCreditcard();
        $this->finishCheckout($expectedPrice);
    }

    public function doGuestCheckout($expectedPrice) {

        // Open basket
        $this->click('Warenkorb');
        //$I->see('Gesamtbetrag', '.cart-layer__total');
        //$I->see('4,00 €');

        // Checkout
        $this->click('Weiter zur Kasse');
        $this->createScreenshot('checkout');

        $this->click(['xpath' => '//div[@class="login-slider__navigation" and text()="Neukunde"]']);
//        $this->waitForElementVisible(['xpath' => '//div[@class="login-slider__navigation" and text()="Neukunde"]'], 5);
        $this->executeJS('$(\'.login-slider__navigation:eq(1)\').click();');
        $this->click('Weiter zur Kasse');
        $this->createScreenshot('checkout_guest');

        // Address
        $this->fillField('#checkout_email',                         'florian.preusner@project-a.com');
        $this->fillField('#checkout_billing_address_first_name',    'Max');
        $this->fillField('#checkout_billing_address_last_name',     'Mustermann');
        $this->fillField('#checkout_billing_address_street',        'Julie-Wolfthorn-Straße');
        $this->fillField('#checkout_billing_address_street_nr',     '1');
        $this->fillField('#checkout_billing_address_zip_code',      '10115');
        $this->fillField('#checkout_billing_address_city',          'Berlin');
        $this->fillField('#checkout_billing_address_iso2code',      'DE');
        $this->fillField('#checkout_billing_address_address-line3', ' ');

        $this->click('Weiter zu Zahlrtarten');
        $this->createScreenshot('checkout_payment');

        $this->payWithCreditcard();
        $this->finishCheckout($expectedPrice);
    }

    protected function payWithCreditcard() {

        $this->click('#checkout_adyen_payment_payment_method_4');
        $this->createScreenshot('checkout_payment_creditcard');

        $this->fillField('#checkout_adyen_payment_payment_detail_adyen_encrypted_form_number',      '4111111111111111');
        $this->fillField('#checkout_adyen_payment_payment_detail_adyen_encrypted_form_cvc',         '737');
        $this->fillField('#checkout_adyen_payment_payment_detail_adyen_encrypted_form_holder_name', 'Max Mustermann');

        $this->selectOption('#checkout_adyen_payment_payment_detail_adyen_encrypted_form_expiry_month', '8');
        $this->selectOption('#checkout_adyen_payment_payment_detail_adyen_encrypted_form_expiry_year',  '2018');

        $this->click('Weiter zu Bestätigung');
        $this->createScreenshot('checkout_payment_confirmation');
    }

    protected function finishCheckout($expectedPrice) {

        $this->see(number_format($expectedPrice, 2, ',', '')) . ' €';
        $this->checkOption('#checkout_terms');
        $this->click('Jetzt kaufen');

        $this->createScreenshot('checkout_payment_finish');
        $this->see('Vielen Dank für Ihren Einkauf!');

        $orderNumber = $this->grabValueFrom('.order-success__number');
        $this->comment(sprintf('Order successfully created: %s', $orderNumber));
    }

    protected function cleanupPrice($price) {

        $withoutCurrency = str_replace('€', '', $price);
        $float           = str_replace(',', '.', $withoutCurrency);

        return trim($float);
    }
}

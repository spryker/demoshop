<?php

namespace tests\Acceptance\Pyz\Modules\Zed\Discount;

use tests\Acceptance\Pyz\Modules\Page;
use tests\Acceptance\Pyz\Data\Zed\DiscountsZed;
/**
 * Class DiscountZed
 *
 */
class DiscountZed extends Page
{
    /**
     * @param \Codeception\Scenario $scenario
     * @return self
     */
    public static function of($scenario) {
        return new self($scenario);
    }

    /**
     * Open create discount page
     *
     * @return $this
     */
    public function openCreateDiscountPage()
    {
        $this->actor->amOnPage('/discount/index/list');
        $this->actor->click(['class' => 'btn-create']);

        return $this;
    }

    /**
     * Create new discount
     *
     * @param string $discountName
     *
     * @return $this
     */
    public function createDiscount($discountName)
    {   $validFrom='2016-01-01';
        $validTo = date("Y-m-d", strtotime('tomorrow'));
        $dayNumber = date('N');
        $applyWhen = 'day-of-week = \'' . $dayNumber . '\'';
        $this->actor->selectOption('#discount_discountGeneral_discount_type', DiscountsZed::$discountData[$discountName]['type']);
        $this->actor->fillField('#discount_discountGeneral_display_name', DiscountsZed::$discountData[$discountName]['name']);
        $this->actor->fillField('#discount_discountGeneral_description',  DiscountsZed::$discountData[$discountName]['description']);
        $this->actor->click('#discount_discountGeneral_is_exclusive_'.DiscountsZed::$discountData[$discountName]['excl']);
        $this->actor->fillField('#discount_discountGeneral_valid_from', $validFrom);
        $this->actor->fillField('#discount_discountGeneral_valid_to', $validTo);

        $this->actor->click('Discount calculation');
        $this->actor->selectOption('#discount_discountCalculator_calculator_plugin', DiscountsZed::$discountData[$discountName]['calcType']);
        $this->actor->fillField('#discount_discountCalculator_amount', DiscountsZed::$discountData[$discountName]['amount']);
        $this->actor->click('#btn-calculation-get');
        $this->actor->fillField('#discount_discountCalculator_collector_query_string', DiscountsZed::$discountData[$discountName]['applyTo']);

        $this->actor->click('Conditions');
        $this->actor->click('#btn-condition-get');
        $this->actor->fillField('#discount_discountCondition_decision_rule_query_string', $applyWhen);
        $this->actor->click('#create-discount-button');
        $this->actor->makeScreenshot('Test123');

        return $this;
    }

    /**
     * Verify success alert about successful creation of discount is present
     * @return $this
     */
    public function verifySuccessfulAlertIsPresent()
    {
        $this->actor->see(DiscountsZed::$SuccessfulAlertMessageCreation, ['class' => 'alert-success']);
        
        return $this;
    }

    /**
     * Activate discount in Edit Discount form
     *
     * @return $this
     */
    public function activateDiscountFromEditForm()
    {
        $this->actor->click(['css' => 'a.btn-sm:nth-child(1)']);
        $this->actor->wait(2);

        return $this;
    }

    /**
     * Verify that discount is successfully activated
     *
     * @return $this
     */
    public function verifyDiscountIsActivated()
    {
        $this->actor->see(DiscountsZed::$SuccessfulAlertMessageActivation, ['class' => 'alert-success']);
  
        return $this;
    }

}
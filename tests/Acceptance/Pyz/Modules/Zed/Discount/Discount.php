<?php

namespace tests\Acceptance\Pyz\Modules\Zed\Discount;

use tests\Acceptance\Pyz\Modules\Page;
use tests\Acceptance\Pyz\Data\Zed\Discounts;
/**
 * Class Discount
 *
 */
class Discount extends Page
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
        $this->actor->waitForElementVisible(['class' => 'btn-create']);
        $this->actor->click(['class' => 'btn-create']);

        return $this;
    }

    /**
     * Fill of discount
     * @param array $discount
     *
     * @return $this
     */
    public function createValidExclusiveDiscount($discount)
    {   $validFrom='15-12-2015';
        $validTo='15-12-2016';
        $this->actor->selectOption('#discount_discountGeneral_discount_type', Discounts::$discountData['Discount1']['type']);
        $this->actor->fillField('#discount_discountGeneral_display_name', Discounts::$discountData['Discount1']['name']);
        $this->actor->fillField('#discount_discountGeneral_description',  Discounts::$discountData['Discount1']['description']);
        $this->actor->click('#discount_discountGeneral_is_exclusive_'.Discounts::$discountData['Discount1']['excl']);
        $this->actor->fillField('#discount_discountGeneral_valid_from', $validFrom);
        $this->actor->fillField('#discount_discountGeneral_valid_to', $validTo);

        $this->actor->click('Discount calculation');
        $this->actor->selectOption('#discount_discountCalculator_calculator_plugin', Discounts::$discountData['Discount1']['calcType']);
        $this->actor->fillField('#discount_discountCalculator_amount', Discounts::$discountData['Discount1']['amount']);
        $this->actor->click('#btn-calculation-get');
        $this->actor->fillField('#discount_discountCalculator_collector_query_string', Discounts::$discountData['Discount1']['applyTo']);

        $this->actor->click('Conditions');
        $this->actor->click('#btn-condition-get');
        $this->actor->fillField('#discount_discountCondition_decision_rule_query_string', Discounts::$discountData['Discount1']['applyWhen']);
        $this->actor->click('#create-discount-button');
        return $this;
    }
}
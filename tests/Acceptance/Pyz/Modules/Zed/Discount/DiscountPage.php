<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:49
 */

namespace tests\Acceptance\Pyz\Modules\__FOLDER__;

use tests\Acceptance\Pyz\Modules\Page;

/**
 * Class __NAME__
 * @package Acceptance\Pyz\Modules
 *
 */
class __NAME__ extends Page
{

    /**
     * @param \Codeception\Scenario $scenario
     * @return __NAME__
     */
    public static function of($scenario) {
        return new __NAME__($scenario);
    }


    /**
     * Open create discount page
     *
     * @return $this
     */
    public function createDiscount()
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
    public function fillDiscount($discount)
    {
        return $this
            ->fillGeneral($discount)
            ->fillCalculations($discount)
            ->fillConditions($discount);
    }
    /**
     * Fill of discount
     * @param array $discount
     *
     * @return $this
     */
    public function fillGeneral($discount)
    {
        $this->actor->click('General calculation');

        $this->actor->selectOption('#discount_discountGeneral_discount_type', $discount['type']);
        $this->actor->fillField('#discount_discountGeneral_display_name', $discount['name']);
        $this->actor->fillField('#discount_discountGeneral_description', $discount['desc']);
        $this->actor->click('#discount_discountGeneral_is_exclusive_' . $discount['excl']);
        $this->actor->fillField('#discount_discountGeneral_valid_from', $discount['valid_from']);
        $this->actor->fillField('#discount_discountGeneral_valid_to', $discount['valid_to']);

        return $this;
    }


    /**
     * Fill of discount
     * @param array $discount
     *
     * @return $this
     */
    public function fillCalculations($discount)
    {
        $this->actor->click('Discount calculation');
        $this->actor->selectOption('#discount_discountCalculator_calculator_plugin', $discount['calc_type']);
        $this->actor->fillField('#discount_discountCalculator_amount', $discount['amount']);
        $this->actor->click('#btn-calculation-get');
        $this->actor->fillField('#discount_discountCalculator_collector_query_string', $discount['apply_to']);

        return $this;
    }


    /**
     * Fill of discount
     * @param array $discount
     *
     * @return $this
     */
    public function fillConditions($discount)
    {
        $this->actor->click('Conditions');
        $this->actor->click('#btn-condition-get');
        $this->actor->fillField('#discount_discountCondition_decision_rule_query_string', $discount['apply_when']);
        $this->actor->click('#create-discount-button');

        return $this;
    }    
}
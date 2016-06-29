<?php

namespace Acceptance\Pyz\OverviewSuite\Discounts;

use Codeception\TestCase\Test;

class CreateExclusiveCeptTest extends Test
{

    public function testSomething()
    {
        echo 'sss';
        exit;
        $I = new \AcceptanceTester($this->scenario);
        $I->am('Admin User');
        $I->wantTo('Create exclusive discount.');
        $I->lookForwardTo('Discount is successfully applied in Yves');

        $name = 'TestExclusiveDiscount8';

        $I->iAmLoggedIn();
        $I->amOnPage('discount/index/list');
        $I->click('Create new Discounvgbjyuijt');
        $I->selectOption('#discount_discountGeneral_discount_type', 'Cart rule');
        $I->fillField('#discount_discountGeneral_display_name', $name);
        $I->fillField('#discount_discountGeneral_description', 'Test Discount Information');
        $I->click('#discount_discountGeneral_is_exclusive_1');
        $I->click('Discount calculation');
        $I->selectOption('#discount_discountCalculator_calculator_plugin', 'Calculator fixed');
        $I->fillField('#discount_discountCalculator_amount', '25,25');
        $I->click('#btn-calculation-get');
        $I->fillField('#discount_discountCalculator_collector_query_string', 'attribute.gps = \'TRUE\'');
        $I->click('#create-discount-button');
        $I->dontSee('could not be identified by specification builder.');
        $I->click('Conditions');
        $I->canSee('Define when to apply the discount');
        $I->click('#btn-condition-get');
        $I->fillField('#discount_discountCondition_decision_rule_query_string', 'day-of-week = \'3\'');
        $I->dontSee('could not be identified by specification builder.');
        $I->click('#create-discount-button');
    }

}
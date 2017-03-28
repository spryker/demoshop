<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Discount\Zed\Tester;

use Acceptance\Discount\Zed\PageObject\DiscountCreatePage;
use ZedAcceptanceTester;

class DiscountTester extends ZedAcceptanceTester
{

    /**
     * @param string $discountName
     *
     * @return $this
     */
    public function createDiscount($discountName)
    {
        $i = $this;

        $validFrom = '2016-01-01';
        $validTo = date('Y-m-d', strtotime('tomorrow'));
        $dayNumber = date('N');
        $applyWhen = 'day-of-week = \'' . $dayNumber . '\'';

        $i->selectOption('#discount_discountGeneral_discount_type', DiscountCreatePage::$discountData[$discountName]['type']);
        $i->fillField('#discount_discountGeneral_display_name', DiscountCreatePage::$discountData[$discountName]['name'] . ' ' . rand(1, 999));
        $i->fillField('#discount_discountGeneral_description',  DiscountCreatePage::$discountData[$discountName]['description']);
        $i->click('#discount_discountGeneral_is_exclusive_' . DiscountCreatePage::$discountData[$discountName]['excl']);
        $i->fillField('#discount_discountGeneral_valid_from', $validFrom);
        $i->fillField('#discount_discountGeneral_valid_to', $validTo);

        $i->click('//div[@class="tabs-container"]/ul/li[2]/a');
        $i->selectOption('#discount_discountCalculator_calculator_plugin', DiscountCreatePage::$discountData[$discountName]['calcType']);
        $i->fillField('#discount_discountCalculator_amount', DiscountCreatePage::$discountData[$discountName]['amount']);
        $i->click('#btn-calculation-get');
        $i->fillField('#discount_discountCalculator_collector_query_string', DiscountCreatePage::$discountData[$discountName]['applyTo']);

        $i->click('Conditions');
        $i->click('#btn-condition-get');
        $i->fillField('#discount_discountCondition_decision_rule_query_string', $applyWhen);
        $i->click('#create-discount-button');
    }

    /**
     * @return $this
     */
    public function activateDiscountFromEditForm()
    {
        $i = $this;
        $i->click('a.btn-sm:nth-child(1)');
        $i->wait(2);

        return $this;
    }

}

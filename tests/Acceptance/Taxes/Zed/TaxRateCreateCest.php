<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Taxes\Zed;

use Acceptance\Taxes\Zed\PageObject\TaxRateCreatePage;
use Acceptance\Taxes\Zed\PageObject\TaxRateListPage;
use Acceptance\Taxes\Zed\Tester\TaxRateTester;

/**
 * @group Acceptance
 * @group Taxes
 * @group Zed
 * @group discount
 */
class TaxRateCreateCest
{

    /**
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateValidTaxRateSuccessMessage(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate');
        $i->expect('Tax rate is successfully created');

        $i->amLoggedInUser();

        $i->amOnPage(TaxRateCreatePage::URL);
        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
        
        $i->wait(2);
        
        $i->makeScreenshot('ttttttt');
        
        $i->see(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

        $i->amOnPage(TaxRateListPage::URL);
        $i->deleteTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
    }

    /**
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateInvalidTaxRateMessage(TaxRateTester $i)
    {
        $i->wantTo('Create invalid tax rate');
        $i->expect('Error messages are displayed. Tax rate is not created');

        $i->amLoggedInUser();

        $i->amOnPage(TaxRateCreatePage::URL);

        $i->see(TaxRateCreatePage::HEADER, TaxRateCreatePage::SELECTOR_HEADER);

        $i->wait(2);
        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_INVALID);

        $i->wait(2);

        $i->see(TaxRateCreatePage::ERROR_MESSAGE_NAME_SHOULD_NOT_BE_BLANK);
        $i->see(TaxRateCreatePage::ERROR_MESSAGE_COUNTRY_SHOULD_NOT_BE_BLANK);
        $i->see(TaxRateCreatePage::ERROR_MESSAGE_PERCENTAGE_SHOULD_BE_VALID_NUMBER);
    }

    /**
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testBackToListOfTaskRatesWithoutSaving(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate and back to list of task rates');
        $i->expect('List of task rates is opened, task rate is not created');

        $i->amLoggedInUser();
        $i->amOnPage(TaxRateCreatePage::URL);

        $i->wait(2);
        
        $i->createTaxRateWithoutSaving(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);
        $i->click(TaxRateCreatePage::SELECTOR_LIST_OF_TASK_RATES_BUTTON);

        $i->dontSee(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);
        
        $i->searchForTaxRate(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);
      
        $i->wait(2);

        $i->see(TaxRateListPage::MESSAGE_EMPTY_TABLE);
    }
}

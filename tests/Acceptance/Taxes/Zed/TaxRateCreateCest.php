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
 */
class TaxRateCreateCest
{

    /**
     * @group Overview
     * @group Smoke
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateValidTaxRateShouldShowSuccessMessage(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate');
        $i->expect('Tax rate is successfully created');

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);

        $i->wait(2);

        $i->see(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

        $i->deleteTaxRateFromEditForm();
    }

    /**
     * @group Overview 
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateInvalidTaxRateShouldShowErrorMessages(TaxRateTester $i)
    {
        $i->wantTo('Create invalid tax rate');
        $i->expect('Error messages are displayed. Tax rate is not created');

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_INVALID);

        $i->wait(2);

        $i->seeErrorMessages();
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testBackToListOfTaskRatesShouldOpenTaxRateListPageWithoutSaving(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate and back to list of task rates');
        $i->expect('List of task rates is opened, task rate is not created');

        $i->wait(2);
        
        $i->createTaxRateWithoutSaving(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);
        $i->click(TaxRateCreatePage::SELECTOR_LIST_OF_TASK_RATES_BUTTON);

        $i->dontSee(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

        $i->searchForTaxRate(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);

        $i->wait(2);

        $i->see(TaxRateListPage::MESSAGE_EMPTY_TABLE);
    }

    /**
     * @group Overview1
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateTaxRateWhichAlreadyExistsShouldShowErrorMessage(TaxRateTester $i)
    {
        $i->wantTo('Create tax rate which already exists');
        $i->expect('Error message is displayed on attempt to create one and the same Tax Rate');

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);

        $i->wait(2);

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
        $i->see(TaxRateCreatePage::ERROR_MESSAGE_TAX_RATE_ALREADY_EXISTS);

        $i->deleteTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateAlreadyExistedTaxRateShouldShowErrorMessage(TaxRateTester $i)
    {
        $i->wantTo('Create tax rate which already exists');
        $i->expect('Error message is displayed on attempt to create one and the same Tax Rate');

        $i->createOneAndTheSameTaxRate(TaxRateCreatePage::TAX_RATE_VALID);

        $i->wait(2);

        $i->see(TaxRateCreatePage::ERROR_MESSAGE_TAX_RATE_ALREADY_EXISTS);

        $i->deleteTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
    }

}

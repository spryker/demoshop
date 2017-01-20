<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Tax\Zed;

use Acceptance\Tax\Zed\PageObject\TaxRateCreatePage;
use Acceptance\Tax\Zed\PageObject\TaxRateListPage;
use Acceptance\Tax\Zed\Tester\TaxRateTester;

/**
 * @group Acceptance
 * @group Tax
 * @group Zed
 * @group TaxRateCreateCest
 */
class TaxRateCreateCest
{

    /**
     * @group Overview
     * @group Smoke
     *
     * @param \Acceptance\Tax\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateValidTaxRateShouldShowSuccessMessage(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate');
        $i->expect('Tax rate is successfully created');

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
        $i->see(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

        $i->removeTaxRateFromDatabase(TaxRateCreatePage::TAX_RATE_VALID);
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Tax\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testCreateInvalidTaxRateShouldShowErrorMessages(TaxRateTester $i)
    {
        $i->wantTo('Create invalid tax rate');
        $i->expect('Error messages are displayed. Tax rate is not created');

        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_INVALID);
        $i->seeErrorMessages();
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Tax\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testBackToListOfTaskRatesShouldOpenTaxRateListPageWithoutSaving(TaxRateTester $i)
    {
        $i->wantTo('Create valid tax rate and back to list of tax rates');
        $i->expect('List of tax rates is opened, tax rate is not created');

        $i->createTaxRateWithoutSaving(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);
        $i->click(TaxRateCreatePage::SELECTOR_LIST_OF_TASK_RATES_BUTTON);

        $i->dontSee(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

        $i->searchForTaxRate(TaxRateCreatePage::TAX_RATE_VALID_NOT_CREATED);

        $i->waitForText(TaxRateListPage::MESSAGE_EMPTY_TABLE, 10);
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Tax\Zed\Tester\TaxRateTester $i
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
    }

    /**
     * @group Overview
     *
     * @param \Acceptance\Tax\Zed\Tester\TaxRateTester $i
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
    }

}

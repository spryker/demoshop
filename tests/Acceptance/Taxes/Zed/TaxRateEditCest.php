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
class TaxRateEditCest
{

    /**
     * @group Overview
     * @group Smoke
     *
     * @param \Acceptance\Taxes\Zed\Tester\TaxRateTester $i
     *
     * @return void
     */
    public function testEditTaxRateWithValidDataSuccessMessage(TaxRateTester $i)
    {
        $i->wantTo('Edit tax set with valid data');
        $i->expect('Tax rate is successfully edited and saved');
        $i->wait(2);
        
        $i->createTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
        $i->wait(2);

        $i->editTaxRateWithValidData(TaxRateCreatePage::TAX_RATE_VALID_EDITED);
        $i->wait(6);

        $i->see(TaxRateCreatePage::MESSAGE_SUCCESSFUL_ALERT_UPDATE);

        $i->deleteTaxRateFromEditForm();
        $i->wait(2);

        $i->searchForTaxRate(TaxRateCreatePage::TAX_RATE_VALID_EDITED);
        $i->wait(2);

        $i->see(TaxRateListPage::MESSAGE_EMPTY_TABLE);

        $i->deleteTaxRate(TaxRateCreatePage::TAX_RATE_VALID);
    }

}

<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Taxes\Zed\Tester;

use Acceptance\Taxes\Zed\PageObject\TaxRateCreatePage;
use Acceptance\Taxes\Zed\PageObject\TaxRateListPage;

class TaxRateTester extends \ZedAcceptanceTester
{

    /**
     * @param string $taxRateName
     *
     * @return $this
     */
    public function createTaxRate($taxRateName)
    {
        $i = $this;
        
        $i->fillField(TaxRateCreatePage::SELECTOR_NAME,  TaxRateCreatePage::$taxRateData[$taxRateName]['name']);
        $i->selectOption(TaxRateCreatePage::SELECTOR_COUNTRY,  TaxRateCreatePage::$taxRateData[$taxRateName]['country']);
        $i->fillField(TaxRateCreatePage::SELECTOR_PERCENTAGE,  TaxRateCreatePage::$taxRateData[$taxRateName]['percentage']);
      
        $i->click(TaxRateCreatePage::SELECTOR_SAVE);
    }

    /**
     * @param string $taxRateName
     *
     * @return $this
     */
    public function createTaxRateWithoutSaving($taxRateName)
    {
        $i = $this;
        
        $i->fillField(TaxRateCreatePage::SELECTOR_NAME,  TaxRateCreatePage::$taxRateData[$taxRateName]['name']);
        $i->selectOption(TaxRateCreatePage::SELECTOR_COUNTRY,  TaxRateCreatePage::$taxRateData[$taxRateName]['country']);
        $i->fillField(TaxRateCreatePage::SELECTOR_PERCENTAGE,  TaxRateCreatePage::$taxRateData[$taxRateName]['percentage']);
    }

    /**
     * @param string $taxRateName
     *
     * @return $this
     */
    public function searchForTaxRate($taxRateName)
    {
        $i = $this;
        
        $i->fillField(TaxRateListPage::SELECTOR_SEARCH, TaxRateCreatePage::$taxRateData[$taxRateName]['name']);
    }

    /**
     * @param string $taxRateName
     *
     * @return $this
     */
    public function deleteTaxRate($taxRateName)
    {
        $i = $this;
        
        $i->fillField(TaxRateListPage::SELECTOR_SEARCH, TaxRateCreatePage::$taxRateData[$taxRateName]['name']);
        $i->click(TaxRateListPage::SELECTOR_DELETE);
    }
}

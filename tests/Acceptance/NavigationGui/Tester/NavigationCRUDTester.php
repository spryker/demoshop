<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\NavigationGui\Tester;

use ZedAcceptanceTester;

class NavigationCRUDTester extends ZedAcceptanceTester
{

    /**
     * @param string $value
     *
     * @return void
     */
    public function setNameField($value)
    {
        $this->fillField('//*[@id="navigation_name"]', $value);
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setKeyField($value)
    {
        $this->fillField('//*[@id="navigation_key"]', $value);
    }

    /**
     * @param bool $checked
     *
     * @return void
     */
    public function checkIsActiveField($checked)
    {
        if ($checked) {
            $this->checkOption('//*[@id="navigation_is_active"]');
        } else {
            $this->uncheckOption('//*[@id="navigation_is_active"]');
        }
    }

    /**
     * @return void
     */
    public function submitNavigationForm()
    {
        $this->click('//*[@id="navigation-save-btn"]');
    }

    /**
     * @param string $pattern
     * @param string $value
     *
     * @return void
     */
    public function seeMatches($pattern, $value)
    {
        $this->assertRegExp($pattern, $value);
    }

    /**
     * @return void
     */
    public function clickEditFirstRowInList()
    {
        $this->click('//*[@id="navigation-table"]/tbody/tr[1]/td[5]/a');
    }

    /**
     * @param string $expectedMessagePattern
     *
     * @return int
     */
    public function seeSuccessMessage($expectedMessagePattern)
    {
        $successMessage = $this->grabTextFrom('//*[@id="page-wrapper"]/div[3]/div[1]/div');
        $this->seeMatches($expectedMessagePattern, $successMessage);

        return preg_match($expectedMessagePattern, $successMessage);
    }

    /**
     * @return void
     */
    public function activateFirstNavigationRow()
    {
        $this->click('//*[@id="navigation-table"]/tbody/tr[1]/td[5]/a[2]');
    }

    /**
     * @return void
     */
    public function deleteFirstNavigationRow()
    {
        $this->submitForm('//*[@id="navigation-table"]/tbody/tr/td[5]/form[1]', []);
    }

}

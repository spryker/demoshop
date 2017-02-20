<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\CmsGui;

use Acceptance\CmsGui\PageObject\CmsListPage;
use Acceptance\CmsGui\Tester\CmsPageListTester;

/**
 * @group Acceptance
 * @group CmsGui
 * @group CmsGuiPageListCest
 */
class CmsGuiPageListCest
{

    /**
     * @param \Acceptance\CmsGui\Tester\CmsPageListTester $i
     *
     * @return void
     */
    public function testICanOpenCmsPageList(CmsPageListTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage(CmsListPage::URL);

        $i->waitForElementVisible(CmsListPage::PAGE_LIST_TABLE_XPATH, 5);
    }

}

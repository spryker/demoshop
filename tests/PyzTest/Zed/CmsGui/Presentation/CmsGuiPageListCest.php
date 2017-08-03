<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PyzTest\Zed\CmsGui\Acceptance;

use PyzTest\Zed\CmsGui\CmsGuiPresentationTester;
use PyzTest\Zed\CmsGui\PageObject\CmsListPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group CmsGui
 * @group Acceptance
 * @group CmsGuiPageListCest
 * Add your own group annotations below this line
 */
class CmsGuiPageListCest
{

    /**
     * @param \PyzTest\Zed\CmsGui\CmsGuiPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenCmsPageList(CmsGuiPresentationTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage(CmsListPage::URL);

        $i->waitForElementVisible(CmsListPage::PAGE_LIST_TABLE_XPATH, 5);
    }

}

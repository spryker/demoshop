<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\CmsGui\Presentation;

;

use PyzTest\Zed\CmsGui\CmsGuiPresentationTester;
use PyzTest\Zed\CmsGui\PageObject\CmsListPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group CmsGui
 * @group Presentation
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

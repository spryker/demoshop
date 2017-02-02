<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\CmsGui;

use Acceptance\CmsGui\PageObject\CmsCreatePage;
use Acceptance\CmsGui\Tester\CmsCreatePageTester;

/**
 * @group Acceptance
 * @group CmsGui
 * @group Yves
 * @group CmsGuiCreatePageTester
 */
class CmsGuiCreatePageCest
{
    /**
     * @param \Acceptance\CmsGui\Tester\CmsCreatePageTester $i
     *
     * @return void
     */
    public function testICanCreateCmsPage(CmsCreatePageTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage(CmsCreatePage::URL);

        $i->setValidFrom('1985-07-01')
            ->setValidTo('2050-07-01')
            ->fillLocalizedUrlForm(0, 'name1', 'url1')
            ->expandLocalizedUrlPane()
            ->fillLocalizedUrlForm(1, 'name1', 'url1')
            ->clickSubmit();

        $i->see(CmsCreatePage::PAGE_CREATED_SUCCESS_MESSAGE);
    }
}

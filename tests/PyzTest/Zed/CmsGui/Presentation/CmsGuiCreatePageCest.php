<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace PyzTest\Zed\CmsGui\Presentation;

use PyzTest\Zed\CmsGui\CmsGuiPresentationTester;
use PyzTest\Zed\CmsGui\PageObject\CmsCreateGlossaryPage;
use PyzTest\Zed\CmsGui\PageObject\CmsCreatePage;
use PyzTest\Zed\CmsGui\PageObject\CmsEditPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group CmsGui
 * @group Presentation
 * @group CmsGuiCreatePageCest
 * Add your own group annotations below this line
 */
class CmsGuiCreatePageCest
{

    /**
     * @param \PyzTest\Zed\CmsGui\CmsGuiPresentationTester $i
     *
     * @return void
     */
    public function testICanCreateCmsPageWithTranslatedPlaceholders(CmsGuiPresentationTester $i)
    {
        $i->wantTo('Create cms page with multiple translations');
        $i->expect('Page is persisted in Zed, exported to Yves and is accesible.');

        $i->amLoggedInUser();
        $i->amOnPage(CmsCreatePage::URL);
        $i->selectOption('//*[@id="cms_page_fkTemplate"]', 'static full page');

        $i->setValidFrom('1985-07-01');
        $i->setValidTo('2050-07-01');
        $i->fillLocalizedUrlForm(0, CmsCreatePage::getLocalizedName('en'), CmsCreatePage::getLocalizedUrl('en'));
        $i->expandLocalizedUrlPane();
        $i->fillLocalizedUrlForm(1, CmsCreatePage::getLocalizedName('de'), CmsCreatePage::getLocalizedUrl('de'));
        $i->clickSubmit();

        $i->see(CmsCreatePage::PAGE_CREATED_SUCCESS_MESSAGE);

        $i->includeJquery();

        $i->fillPlaceholderContents(0, 0, CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'en'));
        $i->fillPlaceholderContents(0, 1, CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'de'));

        $i->fillPlaceholderContents(1, 0, CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'en'));
        $i->fillPlaceholderContents(1, 1, CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'de'));

        $i->clickSubmit();

        $idCmsPage = $i->grabCmsPageId();

        $i->amOnPage(sprintf(CmsEditPage::URL, $idCmsPage));

        $i->clickPublishButton();

        $i->see(CmsEditPage::PAGE_PUBLISH_SUCCESS_MESSAGE);

        $i->runCollectors();

        // TODO re-enable
//        $yvesTester = $i->haveFriend('yvesTester', YvesAcceptanceTester::class);
//
//        $yvesTester->does(function (YvesAcceptanceTester $i) {
//
//            $i->amOnPage(CmsCreatePage::getLocalizedUrl('de'));
//
//            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'de'));
//            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'de'));
//
//            $i->amOnPage(CmsCreatePage::getLocalizedUrl('en'));
//
//            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'en'));
//            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'en'));
//
//        });
    }

}

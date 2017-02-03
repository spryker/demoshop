<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\CmsGui;

use Acceptance\CmsGui\PageObject\CmsCreatePage;
use Acceptance\CmsGui\Tester\CmsCreateGlossaryTester;
use Acceptance\CmsGui\Tester\CmsCreatePageTester;
use Acceptance\CmsGui\PageObject\CmsEditPage;
use YvesAcceptanceTester;
use Acceptance\CmsGui\PageObject\CmsCreateGlossaryPage;

/**
 * @group Acceptance
 * @group CmsGui
 * @group Yves
 * @group CmsGuiCreatePageTester
 */
class CmsGuiCreatePageCest
{

    /**
     * @param \Acceptance\CmsGui\Tester\CmsCreatePageTester $iPage
     * @param \Acceptance\CmsGui\Tester\CmsCreateGlossaryTester $iGlossary
     *
     * @return void
     */
    public function testICanCreateCmsPageWithTranslatedPlaceholders(CmsCreatePageTester $iPage, CmsCreateGlossaryTester $iGlossary)
    {
        $iPage->wantTo('Create cms page with multiple translations');
        $iPage->expect('Page is persisted in Zed, exported to Yves and is accesible.');

        $iPage->amLoggedInUser();
        $iPage->amOnPage(CmsCreatePage::URL);

        $iPage->setValidFrom('1985-07-01');
        $iPage->setValidTo('2050-07-01');
        $iPage->fillLocalizedUrlForm(0, CmsCreatePage::getLocalizedName('en'), CmsCreatePage::getLocalizedUrl('en'));
        $iPage->expandLocalizedUrlPane();
        $iPage->fillLocalizedUrlForm(1, CmsCreatePage::getLocalizedName('de'), CmsCreatePage::getLocalizedUrl('de'));
        $iPage->clickSubmit();

        $iPage->see(CmsCreatePage::PAGE_CREATED_SUCCESS_MESSAGE);

        $iGlossary->includeJquery();

        $iGlossary->fillPlaceholderContents(0, 0, CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'en'));
        $iGlossary->fillPlaceholderContents(0, 1, CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'de'));

        $iGlossary->fillPlaceholderContents(1, 0, CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'en'));
        $iGlossary->fillPlaceholderContents(1, 1, CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'de'));

        $iGlossary->clickSubmit();

        $idCmsPage = $iGlossary->grabCmsPageId();

        $iPage->amOnPage(sprintf(CmsEditPage::URL, $idCmsPage));

        $iPage->clickActivateButton();

        $iPage->see(CmsEditPage::PAGE_ACTIVATE_SUCCESS_MESSAGE);

        $iPage->runCollectors();

        $yvesTester = $iPage->haveFriend('yvesTester', YvesAcceptanceTester::class);

        $yvesTester->does(function (YvesAcceptanceTester $i) {

            $i->amOnPage(CmsCreatePage::getLocalizedUrl('de'));

            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'de'));
            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'de'));

            $i->amOnPage(CmsCreatePage::getLocalizedUrl('en'));

            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('title', 'en'));
            $i->see(CmsCreateGlossaryPage::getLocalizedPlaceholderData('contents', 'en'));

        });

    }
}

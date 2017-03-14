<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\NavigationGui;

use Acceptance\NavigationGui\PageObject\NavigationCreatePage;
use Acceptance\NavigationGui\PageObject\NavigationDeletePage;
use Acceptance\NavigationGui\PageObject\NavigationPage;
use Acceptance\NavigationGui\PageObject\NavigationStatusTogglePage;
use Acceptance\NavigationGui\PageObject\NavigationUpdatePage;
use Acceptance\NavigationGui\Tester\NavigationCRUDTester;

/**
 * @group Acceptance
 * @group NavigationGui
 * @group NavigationCRUDCest
 */
class NavigationCRUDCest
{

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     *
     * @return void
     */
    public function testICanCreateReadUpdateAndDeleteNavigation(NavigationCRUDTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage(NavigationCreatePage::URL);

        $idNavigation = $this->create($i);

        $this->read($i);

        $this->update($i, $idNavigation);

        $this->activate($i);

        $this->delete($i);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     *
     * @return int
     */
    protected function create(NavigationCRUDTester $i)
    {
        $i->wantTo('Create navigation.');
        $i->expect('Navigation is persisted in Zed.');

        $i->setNameField('Acceptance navigation (1)');
        $i->setKeyField('acceptance1');
        $i->checkIsActiveField(true);
        $i->submitNavigationForm();
        $i->seeCurrentUrlEquals(NavigationPage::URL);
        $idNavigation = $i->seeSuccessMessage(NavigationCreatePage::MESSAGE_SUCCESS);

        return $idNavigation;
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     *
     * @return void
     */
    protected function read(NavigationCRUDTester $i)
    {
        $i->wantTo('See navigation list.');
        $i->expect('Navigation table is shown and not empty');

        $i->waitForElementVisible(NavigationPage::PAGE_LIST_TABLE_XPATH, 5);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     * @param int $idNavigation
     *
     * @return void
     */
    protected function update(NavigationCRUDTester $i, $idNavigation)
    {
        $i->wantTo('Update existing navigation.');
        $i->expect('Navigation is persisted in Zed');

        $i->amOnPage(sprintf(NavigationUpdatePage::URL, $idNavigation));
        $i->setNameField('Acceptance navigation (1) - edited');
        $i->checkIsActiveField(false);
        $i->submitNavigationForm();
        $i->seeCurrentUrlEquals(NavigationPage::URL);
        $i->seeSuccessMessage(NavigationUpdatePage::MESSAGE_SUCCESS);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     *
     * @return void
     */
    protected function activate(NavigationCRUDTester $i)
    {
        $i->wantTo('Activate navigation.');
        $i->expect('New navigation status persisted in Zed.');

        $i->amOnPage(NavigationPage::URL);
        $i->waitForElementVisible(NavigationPage::PAGE_LIST_TABLE_XPATH, 5);
        $i->activateFirstNavigationRow();
        $i->seeSuccessMessage(NavigationStatusTogglePage::MESSAGE_SUCCESS);
        $i->seeCurrentUrlEquals(NavigationPage::URL);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationCRUDTester $i
     *
     * @return void
     */
    protected function delete(NavigationCRUDTester $i)
    {
        $i->wantTo('Delete navigation.');
        $i->expect('Navigation is removed from Zed.');

        $i->amOnPage(NavigationPage::URL);
        $i->waitForElementVisible(NavigationPage::PAGE_LIST_TABLE_XPATH, 5);
        $i->wait(1); // TODO: remove "wait" once flash messages show up consistently.
        $i->deleteFirstNavigationRow();
        $i->seeSuccessMessage(NavigationDeletePage::MESSAGE_SUCCESS);
        $i->seeCurrentUrlEquals(NavigationPage::URL);
    }

}

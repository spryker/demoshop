<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\NavigationGui;

use Acceptance\NavigationGui\PageObject\NavigationNodeCreatePage;
use Acceptance\NavigationGui\PageObject\NavigationNodeDeletePage;
use Acceptance\NavigationGui\PageObject\NavigationNodeUpdatePage;
use Acceptance\NavigationGui\PageObject\NavigationPage;
use Acceptance\NavigationGui\Tester\NavigationTreeTester;
use Generated\Shared\Transfer\NavigationNodeLocalizedAttributesTransfer;
use Generated\Shared\Transfer\NavigationNodeTransfer;
use Generated\Shared\Transfer\NavigationTransfer;
use Generated\Shared\Transfer\NavigationTreeNodeTransfer;
use Generated\Shared\Transfer\NavigationTreeTransfer;

/**
 * @group Acceptance
 * @group NavigationGui
 * @group NavigationTreeCest
 */
class NavigationTreeCest
{

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testSeeEmptyNavigationTree(NavigationTreeTester $i)
    {
        $i->wantTo('See navigation tree.');
        $i->expect('Empty navigation tree displayed.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node without type test')
                ->setKey('Create child node without type test')
                ->setIsActive(true)));
        $i->amOnPage(NavigationPage::URL);

        $i->waitForNavigationTree();
        $i->seeNumberOfNavigationNodes(1);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithoutType(NavigationTreeTester $i)
    {
        $i->wantTo('Create child node without type.');
        $i->expect('Navigation should have a root node persisted.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node without type test')
                ->setKey('Create child node without type test')
                ->setIsActive(true)));
        $i->amOnPage(NavigationPage::URL);

        $i->waitForNavigationTree();
        $i->switchToNodeForm();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithoutType('Child 1');

        $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);

        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(2);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithExternalUrlType(NavigationTreeTester $i)
    {
        $i->wantTo('Create external URL child node.');
        $i->expect('Navigation should have a root node persisted.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with external URL type test')
                ->setKey('Create child node with external URL type test')
                ->setIsActive(true))
            ->addNode((new NavigationTreeNodeTransfer())
                ->setNavigationNode((new NavigationNodeTransfer())
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('en_US'))
                        ->setTitle('foo')))));
        $i->amOnPage(NavigationPage::URL);

        $i->waitForNavigationTree();
        $i->switchToNodeForm();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithExternalUrlType('Child 2', 'http://google.com');

        $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);

        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(3);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testUpdateNodeToCategoryType(NavigationTreeTester $i)
    {
        $i->wantTo('Update child node to category type.');
        $i->expect('Node changes should persist in Zed.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Update child node to category type test')
                ->setKey('Update child node to category type test')
                ->setIsActive(true))
            ->addNode((new NavigationTreeNodeTransfer())
                ->setNavigationNode((new NavigationNodeTransfer())
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('en_US'))
                        ->setTitle('foo'))
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('de_DE'))
                        ->setTitle('foo')))));
        $i->amOnPage(NavigationPage::URL);

        $idNavigationNode = $navigationTreeTransfer->getNodes()[0]->getNavigationNode()->getIdNavigationNode();

        $i->waitForNavigationTree();
        $i->clickNode($idNavigationNode);
        $i->switchToNodeForm();
        $i->see('Update node');
        $i->submitUpdateNodeToCategoryType('/en/computer', '/de/computer');

        $i->seeSuccessMessage(NavigationNodeUpdatePage::MESSAGE_SUCCESS);
        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(2);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithCmsPageType(NavigationTreeTester $i)
    {
        $i->wantTo('Create CMS page child node.');
        $i->expect('Navigation should have a new child node persisted.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with CMS page type test')
                ->setKey('Create child node with CMS page type test')
                ->setIsActive(true))
            ->addNode((new NavigationTreeNodeTransfer())
                ->setNavigationNode((new NavigationNodeTransfer())
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('en_US'))
                        ->setTitle('foo'))
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('de_DE'))
                        ->setTitle('foo')))));
        $i->amOnPage(NavigationPage::URL);

        $idNavigationNode = $navigationTreeTransfer->getNodes()[0]->getNavigationNode()->getIdNavigationNode();

        $i->waitForNavigationTree();
        $i->clickNode($idNavigationNode);
        $i->switchToNodeForm();
        $i->clickAddChildNodeButton();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithCmsPageType('Child 1.1', '/en/imprint', '/de/impressum');

        $idChildNavigationNode = $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);
        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(3);
        $i->seeNavigationNodeHierarchy($idNavigationNode, $idChildNavigationNode);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testChangeNavigationTreeStructure(NavigationTreeTester $i)
    {
        $i->wantTo('Change tree structure and save.');
        $i->expect('Updated navigation tree structure should have persisted.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with CMS page type test')
                ->setKey('Create child node with CMS page type test')
                ->setIsActive(true))
            ->addNode((new NavigationTreeNodeTransfer())
                ->setNavigationNode((new NavigationNodeTransfer())
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('en_US'))
                        ->setTitle('node_1'))
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('de_DE'))
                        ->setTitle('node_1')))
                ->addChild((new NavigationTreeNodeTransfer())
                    ->setNavigationNode((new NavigationNodeTransfer())
                        ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                            ->setFkLocale($i->getIdLocale('en_US'))
                            ->setTitle('node_1.1'))
                        ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                            ->setFkLocale($i->getIdLocale('de_DE'))
                            ->setTitle('node_1.1')))))
            ->addNode((new NavigationTreeNodeTransfer())
                ->setNavigationNode((new NavigationNodeTransfer())
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('en_US'))
                        ->setTitle('node_2'))
                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
                        ->setFkLocale($i->getIdLocale('de_DE'))
                        ->setTitle('node_2')))));
        $i->amOnPage(NavigationPage::URL);

        $idNavigationNode = $navigationTreeTransfer->getNodes()[0]
            ->getChildren()[0]
            ->getNavigationNode()
            ->getIdNavigationNode();
        $idTargetNavigationNode = $navigationTreeTransfer->getNodes()[1]
            ->getNavigationNode()
            ->getIdNavigationNode();

        $i->waitForNavigationTree();
        $i->moveNavigationNode($idNavigationNode, $idTargetNavigationNode);
        $i->seeNavigationNodeHierarchy($idTargetNavigationNode, $idNavigationNode);
        $i->saveNavigationTreeOrder();
        $i->seeSuccessfulOrderSaveMessage(NavigationPage::MESSAGE_TREE_UPDATE_SUCCESS);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    public function testDeleteNavigationNode(NavigationTreeTester $i)
    {
        /**
         * Test skipped because popup confirmation is not working as expected under phantomjs.
         * TODO: once we have Selenium, enable this test case.
         */
        return;
//
//        $i->wantTo('Remove child node.');
//        $i->expect('Node should be removed from Zed.');
//
//        $i->amLoggedInUser();
//        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
//            ->setNavigation((new NavigationTransfer())
//                ->setName('Delete navigation node')
//                ->setKey('Delete navigation node')
//                ->setIsActive(true))
//            ->addNode((new NavigationTreeNodeTransfer())
//                ->setNavigationNode((new NavigationNodeTransfer())
//                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
//                        ->setFkLocale($i->getIdLocale('en_US'))
//                        ->setTitle('foo'))
//                    ->addNavigationNodeLocalizedAttribute((new NavigationNodeLocalizedAttributesTransfer())
//                        ->setFkLocale($i->getIdLocale('de_DE'))
//                        ->setTitle('foo')))));
//        $i->amOnPage(NavigationPage::URL);
//
//        $idNavigationNode = $navigationTreeTransfer->getNodes()[0]->getNavigationNode()->getIdNavigationNode();
//
//        $i->waitForNavigationTree();
//        $i->clickNode($idNavigationNode);
//        $i->switchToNodeForm();
//        $i->clickRemoveNodeButton();
//        $i->canSeeInPopup('Are you sure you remove the selected node and all its children?');
//        $i->acceptPopup();
//
//        $i->seeSuccessMessage(NavigationNodeDeletePage::MESSAGE_SUCCESS);
//        $i->switchToNavigationTree();
//        $i->seeNumberOfNavigationNodes(1);
    }

}

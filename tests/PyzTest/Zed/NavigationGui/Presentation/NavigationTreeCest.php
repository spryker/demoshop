<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\NavigationGui\Presentation;

use Generated\Shared\Transfer\NavigationNodeLocalizedAttributesTransfer;
use Generated\Shared\Transfer\NavigationNodeTransfer;
use Generated\Shared\Transfer\NavigationTransfer;
use Generated\Shared\Transfer\NavigationTreeNodeTransfer;
use Generated\Shared\Transfer\NavigationTreeTransfer;
use PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester;
use PyzTest\Zed\NavigationGui\PageObject\NavigationNodeCreatePage;
use PyzTest\Zed\NavigationGui\PageObject\NavigationNodeUpdatePage;
use PyzTest\Zed\NavigationGui\PageObject\NavigationPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group NavigationGui
 * @group Presentation
 * @group NavigationTreeCest
 * Add your own group annotations below this line
 */
class NavigationTreeCest
{

    /**
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testSeeEmptyNavigationTree(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('See navigation tree.');
        $i->expect('Empty navigation tree displayed.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node without type test 1')
                ->setKey('Create child node without type test 1')
                ->setIsActive(true)));
        $i->amOnPage(NavigationPage::URL);

        $i->waitForNavigationTree();
        $i->seeNumberOfNavigationNodes(1);
    }

    /**
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithoutType(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('Create child node without type.');
        $i->expect('Navigation should have a root node persisted.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node without type test 2')
                ->setKey('Create child node without type test 2')
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
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithExternalUrlType(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('Create external URL child node.');
        $i->expect('Navigation should have a root node persisted.');

        $i->amLoggedInUser();
        $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with external URL type test 3')
                ->setKey('Create child node with external URL type test 3')
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
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testUpdateNodeToCategoryType(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('Update child node to category type.');
        $i->expect('Node changes should persist in Zed.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Update child node to category type test 4')
                ->setKey('Update child node to category type test 4')
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
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testCreateChildNodeWithCmsPageType(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('Create CMS page child node.');
        $i->expect('Navigation should have a new child node persisted.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with CMS page type test 5')
                ->setKey('Create child node with CMS page type test 5')
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
     * @group singleNavigationTest
     *
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testChangeNavigationTreeStructure(NavigationGuiPresentationTester $i)
    {
        $i->wantTo('Change tree structure and save.');
        $i->expect('Updated navigation tree structure should have persisted.');

        $i->amLoggedInUser();
        $navigationTreeTransfer = $i->prepareTestNavigationTreeEntities((new NavigationTreeTransfer())
            ->setNavigation((new NavigationTransfer())
                ->setName('Create child node with CMS page type test 6')
                ->setKey('Create child node with CMS page type test 6')
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
     * @param \PyzTest\Zed\NavigationGui\NavigationGuiPresentationTester $i
     *
     * @return void
     */
    public function testDeleteNavigationNode(NavigationGuiPresentationTester $i)
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

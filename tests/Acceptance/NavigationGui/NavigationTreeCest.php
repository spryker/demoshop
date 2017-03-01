<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\NavigationGui;

use Acceptance\NavigationGui\PageObject\NavigationCreatePage;
use Acceptance\NavigationGui\PageObject\NavigationNodeCreatePage;
use Acceptance\NavigationGui\PageObject\NavigationNodeDeletePage;
use Acceptance\NavigationGui\PageObject\NavigationNodeUpdatePage;
use Acceptance\NavigationGui\PageObject\NavigationPage;
use Acceptance\NavigationGui\Tester\NavigationTreeTester;

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
    public function testManipulateNavigationTree(NavigationTreeTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage(NavigationCreatePage::URL);
        $i->prepareTestNavigationEntity();

        $this->seeEmptyNavigationTree($i);

        $idNavigationNode1 = $this->createChildNodeWithoutType($i);

        $idNavigationNode2 = $this->createChildNodeWithExternalUrlType($i);

        $this->updateNodeToCategory($i, $idNavigationNode1);

        $idNavigationNode1_1 = $this->createChildNodeWithCmsPageType($i, $idNavigationNode1);

        $this->changeNavigationTreeStructure($i, $idNavigationNode1_1, $idNavigationNode2);

        $this->deleteNavigationNode($i, $idNavigationNode2);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return void
     */
    protected function seeEmptyNavigationTree(NavigationTreeTester $i)
    {
        $i->wantTo('See navigation tree.');
        $i->expect('Empty navigation tree displayed.');

        $i->amOnPage(NavigationPage::URL);
        $i->waitForNavigationTree();
        $i->seeNumberOfNavigationNodes(1);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return int
     */
    protected function createChildNodeWithoutType(NavigationTreeTester $i)
    {
        $i->wantTo('Create child node without type.');
        $i->expect('Navigation should have a root node persisted.');

        $i->switchToNodeForm();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithoutType('Child 1');

        $idNavigationNode = $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);

        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(2);

        return $idNavigationNode;
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     *
     * @return int
     */
    protected function createChildNodeWithExternalUrlType(NavigationTreeTester $i)
    {
        $i->wantTo('Create external URL child node.');
        $i->expect('Navigation should have a root node persisted.');

        $i->switchToNodeForm();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithExternalUrlType('Child 2', 'http://google.com');

        $idNavigationNode = $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);

        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(3);

        return $idNavigationNode;
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     * @param int $idNavigationNode
     *
     * @return void
     */
    protected function updateNodeToCategory(NavigationTreeTester $i, $idNavigationNode)
    {
        $i->wantTo('Update child node to category type.');
        $i->expect('Node changes should persist in Zed.');

        $i->clickNode($idNavigationNode);
        $i->switchToNodeForm();
        $i->see('Update node');
        $i->submitUpdateNodeToCategoryType('/en/computer', '/de/computer');

        $i->seeSuccessMessage(NavigationNodeUpdatePage::MESSAGE_SUCCESS);
        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(3);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     * @param int $idNavigationNode
     *
     * @return int
     */
    protected function createChildNodeWithCmsPageType(NavigationTreeTester $i, $idNavigationNode)
    {
        $i->wantTo('Create CMS page child node.');
        $i->expect('Navigation should have a new child node persisted.');

        $i->switchToNodeForm();
        $i->clickAddChildNodeButton();
        $i->see('Create child node');
        $i->submitCreateNodeFormWithCmsPageType('Child 1.1', '/en/imprint', '/de/impressum');

        $idChildNavigationNode = $i->seeSuccessMessage(NavigationNodeCreatePage::MESSAGE_SUCCESS);
        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(4);
        $i->seeNavigationNodeHierarchy($idNavigationNode, $idChildNavigationNode);

        return $idChildNavigationNode;
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     * @param int $idNavigationNode
     * @param int $idTargetNavigationNode
     *
     * @return void
     */
    protected function changeNavigationTreeStructure(NavigationTreeTester $i, $idNavigationNode, $idTargetNavigationNode)
    {
        $i->wantTo('Change tree structure and save.');
        $i->expect('Updated navigation tree structure should have persisted.');

        $i->moveNavigationNode($idNavigationNode, $idTargetNavigationNode);
        $i->seeNavigationNodeHierarchy($idTargetNavigationNode, $idNavigationNode);
        $i->saveNavigationTreeOrder();
        $i->seeSuccessfulOrderSaveMessage(NavigationPage::MESSAGE_TREE_UPDATE_SUCCESS);
    }

    /**
     * @param \Acceptance\NavigationGui\Tester\NavigationTreeTester $i
     * @param int $idNavigationNode2
     *
     * @return void
     */
    protected function deleteNavigationNode(NavigationTreeTester $i, $idNavigationNode2)
    {
        $i->wantTo('Remove child node.');
        $i->expect('Node should be removed from Zed.');

        $i->clickNode($idNavigationNode2);
        $i->switchToNodeForm();
        $i->clickRemoveNodeButton();

        $i->seeSuccessMessage(NavigationNodeDeletePage::MESSAGE_SUCCESS);
        $i->switchToNavigationTree();
        $i->seeNumberOfNavigationNodes(2);
    }

}

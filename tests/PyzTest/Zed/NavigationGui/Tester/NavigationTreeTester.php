<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\NavigationGui\Tester;

use Codeception\Scenario;
use Generated\Shared\Transfer\NavigationTreeNodeTransfer;
use Generated\Shared\Transfer\NavigationTreeTransfer;
use Orm\Zed\Navigation\Persistence\SpyNavigation;
use Spryker\Zed\Locale\Business\LocaleFacade;
use Spryker\Zed\Navigation\Business\NavigationFacade;
use ZedAcceptanceTester;

class NavigationTreeTester extends ZedAcceptanceTester
{

    const ROOT_NODE_ANCHOR_SELECTOR = '#navigation-node-0_anchor';
    const CHILD_NODE_ANCHOR_SELECTOR = '#navigation-node-%d_anchor';
    const NAVIGATION_NODE_SELECTOR = '.jstree-node';
    const NAVIGATION_TREE_SELECTOR = '#navigation-tree';
    const NAVIGATION_TREE_SAVE_BUTTON_SELECTOR = '#navigation-tree-save-btn';
    const REMOVE_NODE_BUTTON_SELECTOR = '#remove-selected-node-btn';
    const ADD_CHILD_NODE_BUTTON_SELECTOR = '#add-child-node-btn';
    const LOCALIZED_FORM_CONTAINER_SELECTOR = '#localized_attributes_container-%s .collapse-link';
    const NODE_CHILD_SELECTOR = '#navigation-node-%d #navigation-node-%d';
    const NODE_FORM_IFRAME_NAME = 'navigation-node-form-iframe';
    const SUCCESS_MESSAGE_SELECTOR = '.flash-messages .alert-success';
    const SWEET_ALERT_SELECTOR = '.sweet-alert';
    const SWEET_ALERT_CONFIRM_SELECTOR = '.sweet-alert button.confirm';
    const NODE_FORM_SELECTOR = 'form';

    /**
     * @var \Spryker\Zed\Navigation\Business\NavigationFacade
     */
    protected $navigationFacade;

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacade
     */
    protected $localeFacade;

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->navigationFacade = new NavigationFacade();
        $this->localeFacade = new LocaleFacade();
    }

    /**
     * @return int
     */
    public function prepareTestNavigationEntity()
    {
        $navigationEntity = new SpyNavigation();
        $navigationEntity
            ->setName('Acceptance navigation (2)')
            ->setKey('acceptance2')
            ->setIsActive(true)
            ->save();

        return $navigationEntity->getIdNavigation();
    }

    /**
     * @param string $pattern
     * @param string $value
     *
     * @return void
     */
    public function seeMatches($pattern, $value)
    {
        $this->assertRegExp($pattern, $value);
    }

    /**
     * @param string $expectedMessagePattern
     *
     * @return int
     */
    public function seeSuccessMessage($expectedMessagePattern)
    {
        $successMessage = $this->grabTextFrom(self::SUCCESS_MESSAGE_SELECTOR);
        $this->seeMatches($expectedMessagePattern, $successMessage);

        preg_match($expectedMessagePattern, $successMessage, $matches);

        return $matches[1];
    }

    /**
     * @param string $localeName
     *
     * @return void
     */
    public function expandLocalizedForm($localeName)
    {
        $this->click(sprintf(self::LOCALIZED_FORM_CONTAINER_SELECTOR, $localeName));
    }

    /**
     * @return void
     */
    public function clickRootNode()
    {
        $this->click(self::ROOT_NODE_ANCHOR_SELECTOR);
    }

    /**
     * @param int $idNavigationNode
     *
     * @return void
     */
    public function clickNode($idNavigationNode)
    {
        $this->click(sprintf(self::CHILD_NODE_ANCHOR_SELECTOR, $idNavigationNode));
    }

    /**
     * @return void
     */
    public function waitForNavigationTree()
    {
        $this->waitForElement(self::NAVIGATION_TREE_SELECTOR, 5);
        $this->wait(1);
    }

    /**
     * @param int $count
     *
     * @return void
     */
    public function seeNumberOfNavigationNodes($count)
    {
        $this->seeNumberOfElements(self::NAVIGATION_NODE_SELECTOR, $count);
    }

    /**
     * @param int $idParentNavigationNode
     * @param int $idChildNavigationNode
     *
     * @return void
     */
    public function seeNavigationNodeHierarchy($idParentNavigationNode, $idChildNavigationNode)
    {
        $this->seeElement(sprintf(
            self::NODE_CHILD_SELECTOR,
            $idParentNavigationNode,
            $idChildNavigationNode
        ));
    }

    /**
     * @param int $idNavigationNode
     * @param int $idTargetNavigationNode
     *
     * @return void
     */
    public function moveNavigationNode($idNavigationNode, $idTargetNavigationNode)
    {
        $this->dragAndDrop(
            sprintf(self::CHILD_NODE_ANCHOR_SELECTOR, $idNavigationNode),
            sprintf(self::CHILD_NODE_ANCHOR_SELECTOR, $idTargetNavigationNode)
        );
    }

    /**
     * @return void
     */
    public function saveNavigationTreeOrder()
    {
        $this->click(self::NAVIGATION_TREE_SAVE_BUTTON_SELECTOR);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function seeSuccessfulOrderSaveMessage($message)
    {
        $this->waitForElement(self::SWEET_ALERT_SELECTOR, 5);
        $this->wait(1);
        $this->see($message);
        $this->click(self::SWEET_ALERT_CONFIRM_SELECTOR);
    }

    /**
     * @return void
     */
    public function switchToNodeForm()
    {
        $this->switchToIFrame(self::NODE_FORM_IFRAME_NAME);
        $this->waitForElement(self::NODE_FORM_SELECTOR, 5);
    }

    /**
     * @return void
     */
    public function switchToNavigationTree()
    {
        $this->switchToIFrame();
        $this->waitForNavigationTree();
    }

    /**
     * @return void
     */
    public function clickRemoveNodeButton()
    {
        $this->click(self::REMOVE_NODE_BUTTON_SELECTOR);
    }

    /**
     * @return void
     */
    public function clickAddChildNodeButton()
    {
        $this->click(self::ADD_CHILD_NODE_BUTTON_SELECTOR);
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function submitCreateNodeFormWithoutType($title)
    {
        $this->expandLocalizedForm('de_DE');

        $this->submitForm(self::NODE_FORM_SELECTOR, [
            'navigation_node[navigation_node_localized_attributes][0][title]' => $title,
            'navigation_node[navigation_node_localized_attributes][1][title]' => $title,
            'navigation_node[is_active]' => true,
        ]);
    }

    /**
     * @param string $title
     * @param string $externalUrl
     *
     * @return void
     */
    public function submitCreateNodeFormWithExternalUrlType($title, $externalUrl)
    {
        $this->expandLocalizedForm('de_DE');

        $this->submitForm(self::NODE_FORM_SELECTOR, [
            'navigation_node[node_type]' => 'external_url',
            'navigation_node[navigation_node_localized_attributes][0][external_url]' => $externalUrl,
            'navigation_node[navigation_node_localized_attributes][1][external_url]' => $externalUrl,
            'navigation_node[navigation_node_localized_attributes][0][title]' => $title,
            'navigation_node[navigation_node_localized_attributes][1][title]' => $title,
            'navigation_node[is_active]' => true,
        ]);
    }

    /**
     * @param string $categoryUrl_en_US
     * @param string $categoryUrl_de_DE
     *
     * @return void
     */
    public function submitUpdateNodeToCategoryType($categoryUrl_en_US, $categoryUrl_de_DE)
    {
        $this->expandLocalizedForm('de_DE');

        $this->submitForm(self::NODE_FORM_SELECTOR, [
            'navigation_node[node_type]' => 'category',
            'navigation_node[navigation_node_localized_attributes][0][category_url]' => $categoryUrl_en_US,
            'navigation_node[navigation_node_localized_attributes][1][category_url]' => $categoryUrl_de_DE,
        ]);
    }

    /**
     * @param string $title
     * @param string $cmsPageUrl_en_US
     * @param string $cmsPageUrl_de_DE
     *
     * @return void
     */
    public function submitCreateNodeFormWithCmsPageType($title, $cmsPageUrl_en_US, $cmsPageUrl_de_DE)
    {
        $this->expandLocalizedForm('de_DE');

        $this->submitForm(self::NODE_FORM_SELECTOR, [
            'navigation_node[node_type]' => 'cms_page',
            'navigation_node[navigation_node_localized_attributes][0][title]' => $title,
            'navigation_node[navigation_node_localized_attributes][0][cms_page_url]' => $cmsPageUrl_en_US,
            'navigation_node[navigation_node_localized_attributes][1][title]' => $title,
            'navigation_node[navigation_node_localized_attributes][1][cms_page_url]' => $cmsPageUrl_de_DE,
            'navigation_node[is_active]' => true,
        ]);
    }

    /**
     * @param \Generated\Shared\Transfer\NavigationTreeTransfer $navigationTreeTransfer
     *
     * @return \Generated\Shared\Transfer\NavigationTreeTransfer
     */
    public function prepareTestNavigationTreeEntities(NavigationTreeTransfer $navigationTreeTransfer)
    {
        $navigationTransfer = $this->navigationFacade->createNavigation($navigationTreeTransfer->getNavigation());

        foreach ($navigationTreeTransfer->getNodes() as $navigationTreeNodeTransfer) {
            $this->createNavigationNodesRecursively($navigationTreeNodeTransfer, $navigationTransfer->getIdNavigation());
        }

        return $navigationTreeTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\NavigationTreeNodeTransfer $navigationTreeNodeTransfer
     * @param int $idNavigation
     * @param int|null $idParentNavigationNode
     *
     * @return void
     */
    protected function createNavigationNodesRecursively(NavigationTreeNodeTransfer $navigationTreeNodeTransfer, $idNavigation, $idParentNavigationNode = null)
    {
        $navigationNodeTransfer = $navigationTreeNodeTransfer->getNavigationNode();
        $navigationNodeTransfer
            ->setFkNavigation($idNavigation)
            ->setFkParentNavigationNode($idParentNavigationNode);

        $navigationNodeTransfer = $this->navigationFacade->createNavigationNode($navigationNodeTransfer);

        foreach ($navigationTreeNodeTransfer->getChildren() as $childNavigationTreeNodeTransfer) {
            $this->createNavigationNodesRecursively($childNavigationTreeNodeTransfer, $idNavigation, $navigationNodeTransfer->getIdNavigationNode());
        }
    }

    /**
     * @param string $locale
     *
     * @return int
     */
    public function getIdLocale($locale)
    {
        return $this->localeFacade->getLocale($locale)->getIdLocale();
    }

}

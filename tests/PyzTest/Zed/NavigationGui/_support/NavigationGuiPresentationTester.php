<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\NavigationGui;

use Codeception\Actor;
use Codeception\Scenario;
use Generated\Shared\Transfer\NavigationNodeLocalizedAttributesTransfer;
use Generated\Shared\Transfer\NavigationNodeTransfer;
use Generated\Shared\Transfer\NavigationTransfer;
use Generated\Shared\Transfer\NavigationTreeNodeTransfer;
use Generated\Shared\Transfer\NavigationTreeTransfer;
use Orm\Zed\Navigation\Persistence\SpyNavigation;
use PyzTest\Zed\NavigationGui\PageObject\NavigationNodeCreatePage;
use PyzTest\Zed\NavigationGui\PageObject\NavigationNodeUpdatePage;
use PyzTest\Zed\NavigationGui\PageObject\NavigationPage;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class NavigationGuiPresentationTester extends Actor
{

    use _generated\NavigationGuiPresentationTesterActions;

    const ROOT_NODE_ANCHOR_SELECTOR = '#navigation-node-0_anchor';
    const CHILD_NODE_ANCHOR_SELECTOR = '#navigation-node-%d_anchor';
    const NAVIGATION_NODE_SELECTOR = '.jstree-node';
    const NAVIGATION_TREE_SELECTOR = '#navigation-tree';
    const NAVIGATION_TREE_SAVE_BUTTON_SELECTOR = '#navigation-tree-save-btn';
    const REMOVE_NODE_BUTTON_SELECTOR = '#remove-selected-node-btn';
    const ADD_CHILD_NODE_BUTTON_SELECTOR = '#add-child-node-btn';
    const LOCALIZED_FORM_CONTAINER_SELECTOR = '#localized_attributes_container-%s .collapse-link';
    const NODE_CHILD_SELECTOR = '#navigation-node-%d #navigation-node-%d';
    const NODE_NAME_CHILD_SELECTOR = "//*[@id=\"navigation-node-%d\"]//*[text()[contains(.,'%s')]]";
    const NODE_FORM_IFRAME_NAME = 'navigation-node-form-iframe';
    const SUCCESS_MESSAGE_SELECTOR = '.flash-messages .alert-success';
    const SWEET_ALERT_SELECTOR = '.sweet-alert';
    const SWEET_ALERT_CONFIRM_SELECTOR = '.sweet-alert button.confirm';
    const NODE_FORM_SELECTOR = 'form';

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->amZed();
        $this->amLoggedInUser();
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setNameField($value)
    {
        $this->fillField('//*[@id="navigation_name"]', $value);
    }

    /**
     * @param string $value
     *
     * @return void
     */
    public function setKeyField($value)
    {
        $this->fillField('//*[@id="navigation_key"]', $value);
    }

    /**
     * @param bool $checked
     *
     * @return void
     */
    public function checkIsActiveField($checked)
    {
        if ($checked) {
            $this->checkOption('//*[@id="navigation_is_active"]');
        } else {
            $this->uncheckOption('//*[@id="navigation_is_active"]');
        }
    }

    /**
     * @return void
     */
    public function submitNavigationForm()
    {
        $this->click('//*[@id="navigation-save-btn"]');
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
     * @return void
     */
    public function clickEditFirstRowInList()
    {
        $this->click('//*[@id="navigation-table"]/tbody/tr[1]/td[5]/a');
    }

    /**
     * @param string $expectedMessagePattern
     *
     * @return int
     */
    public function seeSuccessMessage($expectedMessagePattern)
    {
        $successMessage = $this->grabTextFrom('//div[@class="flash-messages"]/div');
        $this->seeMatches($expectedMessagePattern, $successMessage);

        preg_match($expectedMessagePattern, $successMessage, $matches);

        return $matches[1];
    }

    /**
     * @return void
     */
    public function activateFirstNavigationRow()
    {
        $this->click('//*[@id="navigation-table"]/tbody/tr[1]/td[5]/a[2]');
    }

    /**
     * @return void
     */
    public function deleteFirstNavigationRow()
    {
        $this->submitForm('//*[@id="navigation-table"]/tbody/tr/td[5]/form[1]', []);
    }

    /**
     * @return void
     */
    public function testSeeEmptyNavigationTree()
    {
        $i = $this;
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
     * @return void
     */
    public function testCreateChildNodeWithoutType()
    {
        $i = $this;
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
     * @return void
     */
    public function testCreateChildNodeWithExternalUrlType()
    {
        $i = $this;
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
     * @return void
     */
    public function testUpdateNodeToCategoryType()
    {
        $i = $this;
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
     * @return void
     */
    public function testCreateChildNodeWithCmsPageType()
    {
        $i = $this;
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
     * @return void
     */
    public function testChangeNavigationTreeStructure()
    {
        $i = $this;
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
     * @return void
     */
    public function testDeleteNavigationNode()
    {
        $i = $this;
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
        $this->waitForElement(self::NAVIGATION_TREE_SELECTOR);
        $this->wait(5);
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
        $this->waitForElement(sprintf(
            self::NODE_CHILD_SELECTOR,
            $idParentNavigationNode,
            $idChildNavigationNode
        ));
    }

    /**
     * @param int $idParentNavigationNode
     * @param string $childNavigationNodeName
     *
     * @return void
     */
    public function seeNavigationNodeHierarchyByChildNodeName($idParentNavigationNode, $childNavigationNodeName)
    {
        $this->seeElement(sprintf(
            self::NODE_NAME_CHILD_SELECTOR,
            $idParentNavigationNode,
            $childNavigationNodeName
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
        $navigationTransfer = $this->getLocator()->navigation()->facade()->createNavigation($navigationTreeTransfer->getNavigation());

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

        $navigationNodeTransfer = $this->getLocator()->navigation()->facade()->createNavigationNode($navigationNodeTransfer);

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
        return $this->getLocator()->locale()->facade()->getLocale($locale)->getIdLocale();
    }

}

<?php

namespace Pyz\Zed\CategoryTree\Business\Internal\DemoData;

use ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use Pyz\Zed\CategoryTree\Business\CategoryTreeFacade;

/**
 * Class CategoryTreeInstall
 *
 * @package ProjectA\Zed\CategoryTree\Business\Internal\DemoData
 */
class CategoryTreeInstall implements DemoDataInstallInterface
{
    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const PARENT_NAME = 'parent_name';

    /**
     * @var CategoryTreeQueryContainer
     */
    protected $queryContainer;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var CategoryTreeFacade
     */
    protected $categoryFacade;

    /**
     * Constructor
     */
    public function __construct()
    {
        // TODO must be injected
        $locator = new Locator();
        $this->locale = \SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()
            ->findOneByLocaleName(\ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale());
        $this->queryContainer = $locator->categoryTree()->queryContainer();
        $this->categoryFacade = $locator->categoryTree()->facade();
    }


    /**
     * @param Console $console
     */
    public function install(Console $console)
    {
        $console->info('This will install a Dummy CategoryTree in the demo shop');

        if ($console->askConfirmation('Do you really want this?')) {
            $demoTree = $this->getDemoTree();

            if ($this->categoryFacade->getRootNode()) {
                $console->warning('Dummy CategoryTree already installed. Skipping.');

                return;
            }

            $this->write($demoTree);
        }
    }

    /**
     * @return array
     */
    protected function getDemoTree()
    {
        $reader = new CsvFileReader();

        return $reader->read(__DIR__ . '/demo-category-tree.csv')->getData();
    }

    /**
     * @param array $demoTree
     */
    protected function write(array $demoTree)
    {
        foreach ($demoTree as $row) {
            if (1 == $row[self::IS_ROOT]) {
                $this->addRootNode($row);
            } else {
                $this->addChild($row);
            }
        }
    }

    /**
     * @param array $rawNode
     */
    protected function addRootNode(array $rawNode)
    {
        $category = $this->categoryFacade->createCategory($rawNode[self::CATEGORY_NAME], $this->locale);
        $this->categoryFacade->createCategoryNode($category->getIdCategory(), $this->locale);
        $this->touchNavigation();
    }

    /**
     * @param array $rawNode
     */
    protected function addChild($rawNode)
    {
        $category = $this->categoryFacade->createCategory($rawNode[self::CATEGORY_NAME], $this->locale);
        $parentId = $this->getParentId($rawNode);
        $this->categoryFacade->createCategoryNode($category->getIdCategory(), $this->locale, $parentId);
        $this->touchCategory($category->getIdCategory());
    }

    /**
     * @param array $rawNode
     *
     * @return bool
     */
    protected function getParentId($rawNode)
    {
        $nodeQuery = $this->queryContainer->getNodeQueryByCategoryName($rawNode[self::PARENT_NAME], $this->locale);
        $nodeEntity = $nodeQuery->findOne();

        if ($nodeEntity) {
            return $nodeEntity->getPrimaryKey();
        }

        return false;
    }

    /**
     * @return CategoryTreeQueryContainer
     */
    protected function getQueryContainer()
    {
        // TODO this must be injected
        return (new Locator())->categoryTree()->queryContainer();
    }

    /**
     * @param int $categoryId
     *
     * @throws \Exception
     * @throws \PropelException
     */
    protected function touchCategory($categoryId)
    {
        $nodes = $this->getQueryContainer()->getNodesByCategoryId($categoryId)->find();

        /** @var \ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode $node */
        foreach ($nodes as $node) {
            $nodeTouched = \SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery::create()
                ->filterByItemId($node->getIdCategoryNode())
                ->filterByItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
                ->filterByItemType('category-node')
                ->findOne();

            if (!$nodeTouched) {
                $nodeTouched = new \SprykerCore_Zed_Touch_Persistence_Propel_PacTouch();
            }

            $nodeTouched
                ->setItemType('category-node')
                ->setItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
                ->setItemId($node->getIdCategoryNode())
                ->setTouched(new \DateTime())
                ->save();
        }
    }

    /**
     * @throws \Exception
     * @throws \PropelException
     */
    protected function touchNavigation()
    {
        $navigationTouched = \SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery::create()
            ->filterByItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
            ->filterByItemType('navigation')
            ->findOne();

        if (!$navigationTouched) {
            $navigationTouched = new \SprykerCore_Zed_Touch_Persistence_Propel_PacTouch();
        }

        $navigationTouched
            ->setItemType('navigation')
            ->setItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
            ->setItemId(1)
            ->setTouched(new \DateTime())
            ->save();
    }
}

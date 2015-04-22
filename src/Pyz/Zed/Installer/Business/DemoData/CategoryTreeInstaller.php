<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use ProjectA\Zed\Category\Business\CategoryFacade;
use ProjectA\Zed\Category\Persistence\CategoryQueryContainer;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerCore\Zed\Locale\Business\LocaleFacade;

class CategoryTreeInstaller extends AbstractInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const PARENT_NAME = 'parent_name';

    /**
     * @var CategoryQueryContainer
     */
    protected $queryContainer;

    /**
     * @var int
     */
    protected $idLocale;

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @var LocatorLocatorInterface|AutoCompletion
     */
    protected $locator;

    /**
     * @var array
     */
    protected $rawCategoryTreeData;

    /**
     * @param CategoryFacade $categoryFacade
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     * @param LocatorLocatorInterface $locator
     * @param $rawCategoryTreeData
     */
    public function __construct(
        CategoryFacade $categoryFacade,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade,
        LocatorLocatorInterface $locator,
        $rawCategoryTreeData
    ) {
        $this->categoryFacade = $categoryFacade;
        $this->queryContainer = $categoryQueryContainer;
        $this->idLocale = $localeFacade->getCurrentIdLocale();
        $this->locator = $locator;
        $this->rawCategoryTreeData = $rawCategoryTreeData;
    }

    public function install()
    {
        $this->info('This will install a Dummy CategoryTree in the demo shop');

        if ($this->queryContainer->queryRootNode()->count() > 0) {
            $this->warning('Dummy CategoryTree already installed. Skipping.');

            return;
        }

        $this->write($this->rawCategoryTreeData);
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
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = $this->locator->category()->transferCategoryNode();
        $categoryNodeTransfer->setIsRoot(true);
        $categoryNodeTransfer->setFkCategory($idCategory);

        $this->categoryFacade->createCategoryNode($categoryNodeTransfer, $this->idLocale);
    }

    /**
     * @param array $rawNode
     */
    protected function addChild(array $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = $this->locator->category()->transferCategoryNode();
        $categoryNodeTransfer->setIsRoot(false);
        $categoryNodeTransfer->setFkCategory($idCategory);
        $categoryNodeTransfer->setFkParentCategoryNode($this->getParentId($rawNode));

        $this->categoryFacade->createCategoryNode($categoryNodeTransfer, $this->idLocale);
    }

    /**
     * @param array $rawNode
     *
     * @return bool
     */
    protected function getParentId(array $rawNode)
    {
        $nodeQuery = $this->queryContainer->queryNodeByCategoryName($rawNode[self::PARENT_NAME], $this->idLocale);
        $nodeEntity = $nodeQuery->findOne();

        if ($nodeEntity) {
            return $nodeEntity->getPrimaryKey();
        }

        return false;
    }

    /**
     * @param $rawNode
     *
     * @return int
     */
    protected function createCategory(array $rawNode)
    {
        $categoryTransfer = $this->locator->category()->transferCategory();
        $categoryTransfer->setName($rawNode[self::CATEGORY_NAME]);
        $idCategory = $this->categoryFacade->createCategory($categoryTransfer, $this->idLocale);

        return $idCategory;
    }
}

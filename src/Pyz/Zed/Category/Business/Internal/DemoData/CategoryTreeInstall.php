<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Category\Business\CategoryFacade;
use ProjectA\Zed\Category\Persistence\CategoryQueryContainer;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use SprykerCore\Zed\Locale\Business\LocaleFacade;
use SprykerCore\Zed\Locale\Persistence\Propel\PacLocaleQuery;

class CategoryTreeInstall extends AbstractInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const PARENT_NAME = 'parent_name';

    /**
     * @var CategoryQueryContainer
     */
    protected $queryContainer;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @param CategoryFacade $categoryFacade
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     */
    public function __construct(
        CategoryFacade $categoryFacade,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade
    ) {
        $this->categoryFacade = $categoryFacade;
        $this->queryContainer = $categoryQueryContainer;

        $this->locale = PacLocaleQuery::create()
            ->findOneByLocaleName($localeFacade->getCurrentLocale());
    }

    public function install()
    {
        $this->info('This will install a Dummy CategoryTree in the demo shop');

        $demoTree = $this->getDemoTree();

        if ($this->categoryFacade->getRootNode()) {
            $this->warning('Dummy CategoryTree already installed. Skipping.');

            return;
        }

        $this->write($demoTree);
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
    }

    /**
     * @param array $rawNode
     */
    protected function addChild($rawNode)
    {
        $category = $this->categoryFacade->createCategory($rawNode[self::CATEGORY_NAME], $this->locale);
        $parentId = $this->getParentId($rawNode);
        $this->categoryFacade->createCategoryNode($category->getIdCategory(), $this->locale, $parentId);
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
}

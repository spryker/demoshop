<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Category\Business\CategoryFacade;
use ProjectA\Zed\Category\Persistence\CategoryQueryContainer;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use SprykerCore\Zed\Locale\Persistence\Propel\PacLocaleQuery;

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
     * Constructor
     */
    public function __construct()
    {
        // TODO must be injected
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();
        //we should use the locale facade to get the current Locale
        $localeFacade = $locator->locale()->facade();
        $this->locale = PacLocaleQuery::create()
            ->findOneByLocaleName($localeFacade->getCurrentLocale());

        $this->queryContainer = $locator->category()->queryContainer();
        $this->categoryFacade = $locator->category()->facade();
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

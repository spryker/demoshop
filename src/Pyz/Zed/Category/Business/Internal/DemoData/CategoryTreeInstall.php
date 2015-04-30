<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use SprykerEngine\Shared\Dto\LocaleDto;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Zed\Category\Business\CategoryFacade;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerEngine\Zed\Locale\Business\LocaleFacade;

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
     * @var LocaleDto
     */
    protected $locale;

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @var LocatorLocatorInterface|AutoCompletion
     */
    protected $locator;

    /**
     * @param CategoryFacade $categoryFacade
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(
        CategoryFacade $categoryFacade,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade,
        LocatorLocatorInterface $locator
    ) {
        $this->categoryFacade = $categoryFacade;
        $this->queryContainer = $categoryQueryContainer;
        $this->locale = $localeFacade->getCurrentLocale();
        $this->locator = $locator;
    }

    public function install()
    {
        $this->info('This will install a Dummy CategoryTree in the demo shop');

        $demoTree = $this->getDemoTree();

        if ($this->queryContainer->queryRootNode()->count() > 0) {
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
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = new \Generated\Shared\Transfer\CategoryCategoryNodeTransfer();
        $categoryNodeTransfer->setIsRoot(true);
        $categoryNodeTransfer->setFkCategory($idCategory);

        $this->categoryFacade->createCategoryNode($categoryNodeTransfer, $this->locale);
    }

    /**
     * @param array $rawNode
     */
    protected function addChild(array $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = new \Generated\Shared\Transfer\CategoryCategoryNodeTransfer();
        $categoryNodeTransfer->setIsRoot(false);
        $categoryNodeTransfer->setFkCategory($idCategory);
        $categoryNodeTransfer->setFkParentCategoryNode($this->getParentId($rawNode));

        $this->categoryFacade->createCategoryNode($categoryNodeTransfer, $this->locale);
    }

    /**
     * @param array $rawNode
     *
     * @return bool
     */
    protected function getParentId(array $rawNode)
    {
        $nodeQuery = $this->queryContainer->queryNodeByCategoryName($rawNode[self::PARENT_NAME], $this->locale->getIdLocale());
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
        $categoryTransfer = new \Generated\Shared\Transfer\CategoryCategoryTransfer();
        $categoryTransfer->setName($rawNode[self::CATEGORY_NAME]);
        $idCategory = $this->categoryFacade->createCategory($categoryTransfer, $this->locale);

        return $idCategory;
    }
}

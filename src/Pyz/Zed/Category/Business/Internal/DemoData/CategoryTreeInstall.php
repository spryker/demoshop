<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use SprykerEngine\Zed\Locale\Business\LocaleFacade;
use SprykerFeature\Zed\Category\Business\Model\CategoryWriter;
use SprykerFeature\Zed\Category\Business\Model\CategoryWriterInterface;
use SprykerFeature\Zed\Category\Business\Tree\CategoryTreeWriter;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;

class CategoryTreeInstall extends AbstractInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const PARENT_NAME = 'parent_name';
    const IMAGE_NAME = 'image_name';

    /**
     * @var CategoryWriter
     */
    protected $categoryWriter;

    /**
     * @var CategoryTreeWriter
     */
    protected $categoryTreeWriter;

    /**
     * @var CategoryQueryContainer
     */
    protected $queryContainer;

    /**
     * @var LocaleTransfer
     */
    protected $locale;

    /**
     * @param CategoryWriterInterface $categoryWriter
     * @param CategoryTreeWriter $categoryTreeWriter
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     */
    public function __construct(
        CategoryWriterInterface $categoryWriter,
        CategoryTreeWriter $categoryTreeWriter,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade
    ) {
        $this->categoryWriter = $categoryWriter;
        $this->categoryTreeWriter = $categoryTreeWriter;
        $this->queryContainer = $categoryQueryContainer;
        $this->locale = $localeFacade->getCurrentLocale();
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
            if (1 === (int) $row[self::IS_ROOT]) {
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

        $categoryNodeTransfer = new NodeTransfer();
        $categoryNodeTransfer->setIsRoot(true);
        $categoryNodeTransfer->setFkCategory($idCategory);

        $this->categoryTreeWriter->createCategoryNode($categoryNodeTransfer, $this->locale);
    }

    /**
     * @param array $rawNode
     */
    protected function addChild(array $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $categoryNodeTransfer = new NodeTransfer();
        $categoryNodeTransfer->setIsRoot(false);
        $categoryNodeTransfer->setFkCategory($idCategory);
        $categoryNodeTransfer->setFkParentCategoryNode($this->getParentId($rawNode));

        $this->categoryTreeWriter->createCategoryNode($categoryNodeTransfer, $this->locale);
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
     * @param array $rawNode
     *
     * @return int
     */
    protected function createCategory(array $rawNode)
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setName($rawNode[self::CATEGORY_NAME]);
        $categoryTransfer->setImageName($rawNode[self::IMAGE_NAME]);
        $idCategory = $this->categoryWriter->create($categoryTransfer, $this->locale);

        return $idCategory;
    }

}

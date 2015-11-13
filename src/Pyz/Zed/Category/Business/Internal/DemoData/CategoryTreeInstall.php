<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Locale\Business\LocaleFacade;
use SprykerEngine\Zed\Touch\Business\TouchFacade;
use SprykerFeature\Shared\Category\CategoryConfig;
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
    const CATEGORY_KEY = 'key';
    const PARENT_KEY = 'parent_key';
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
     * @var LocaleFacade
     */
    protected $localeFacade;

    /**
     * @param CategoryWriterInterface $categoryWriter
     * @param CategoryTreeWriter $categoryTreeWriter
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param LocaleFacade $localeFacade
     * @param TouchFacade $touchFacade
     */
    public function __construct(
        CategoryWriterInterface $categoryWriter,
        CategoryTreeWriter $categoryTreeWriter,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleFacade $localeFacade,
        TouchFacade $touchFacade
    ) {
        $this->categoryWriter = $categoryWriter;
        $this->categoryTreeWriter = $categoryTreeWriter;
        $this->queryContainer = $categoryQueryContainer;
        $this->localeFacade = $localeFacade;
        $this->locale = $localeFacade->getCurrentLocale();
        $this->touchFacade = $touchFacade;
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
     * @return \SimpleXMLElement
     */
    protected function getDemoTree()
    {
        //@TODO it must come from config
        $xmlContent = file_get_contents(__DIR__ . '/demo-category-tree.xml');
        $xml = new \SimpleXMLElement($xmlContent);

        return $xml;
    }

    /**
     * @param \SimpleXMLElement $demoTree
     */
    protected function write(\SimpleXMLElement $demoTree)
    {
        foreach ($demoTree as $row) {
            if ((int) $row[self::IS_ROOT] === 1) {
                $this->addRootNode($row);
            } else {
                $this->addChild($row);
            }
        }
    }

    /**
     * @param \SimpleXMLElement $rawNode
     */
    protected function addRootNode(\SimpleXMLElement $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $this->categoryTreeWriter->createCategoryNode($rootNodeTransfer, $this->locale);

        $this->createRootNavigation($rootNodeTransfer);
    }

    /**
     * @param \SimpleXMLElement $rawNode
     */
    protected function addChild(\SimpleXMLElement $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $childNodeTransfer = new NodeTransfer();
        $childNodeTransfer->setIsRoot(false);
        $childNodeTransfer->setFkCategory($idCategory);
        $childNodeTransfer->setFkParentCategoryNode($this->getParentId($rawNode));

        $this->categoryTreeWriter->createCategoryNode($childNodeTransfer, $this->locale);
    }

    /**
     * @param \SimpleXMLElement $rawNode
     *
     * @return bool
     */
    protected function getParentId(\SimpleXMLElement $rawNode)
    {
        $nodeQuery = $this->queryContainer->queryNodeByCategoryKey((string) $rawNode->{self::PARENT_KEY});
        $nodeEntity = $nodeQuery->findOne();

        if ($nodeEntity) {
            return $nodeEntity->getPrimaryKey();
        }

        return false;
    }

    /**
     * @param \SimpleXMLElement $rawNode
     *
     * @return int|null
     */
    protected function createCategory(\SimpleXMLElement $rawNode)
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setCategoryKey((string) $rawNode->{self::CATEGORY_KEY});

        $locales = $this->localeFacade->getAvailableLocales();
        $idCategory = null;

        foreach($locales as $locale) {
            $localeAttributes = $rawNode->xpath('locales/locale[@id="' . $locale . '"]');
            $localeAttributes = current($localeAttributes);

            if($localeAttributes === false) {
                continue;
            }

            $categoryTransfer->setName((string) $localeAttributes->{self::CATEGORY_NAME});
            $categoryTransfer->setCategoryImageName((string) $localeAttributes->{self::IMAGE_NAME});

            if ($idCategory === null) {
                $idCategory = $this->categoryWriter->create($categoryTransfer, $this->localeFacade->getLocale($locale));
            } else {
                $categoryTransfer->setIdCategory($idCategory);
                $this->categoryWriter->addCategoryAttribute($categoryTransfer, $this->localeFacade->getLocale($locale));
            }
        }

        return $idCategory;
    }

    /**
     * @param NodeTransfer $rootNodeTransfer
     *
     * @return void
     */
    protected function createRootNavigation(NodeTransfer $rootNodeTransfer)
    {
        if (!$rootNodeTransfer->getIsRoot()) {
            return;
        }

        $this->touchFacade->touchActive(CategoryConfig::RESOURCE_TYPE_NAVIGATION, $rootNodeTransfer->getIdCategoryNode());
    }

}

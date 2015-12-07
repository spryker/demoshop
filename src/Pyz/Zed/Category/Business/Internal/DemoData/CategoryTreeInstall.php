<?php

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Business\Model\CategoryWriter;
use Spryker\Zed\Category\Business\Model\CategoryWriterInterface;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;

class CategoryTreeInstall extends AbstractInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const CATEGORY_KEY = 'key';
    const PARENT_KEY = 'parent_key';
    const IMAGE_NAME = 'image_name';
    const NODE_ORDER = 'order';

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
     * @var CategoryToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @param CategoryWriterInterface $categoryWriter
     * @param CategoryTreeWriter $categoryTreeWriter
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param CategoryToLocaleInterface $localeFacade
     * @param CategoryToTouchInterface $touchFacade
     */
    public function __construct(
        CategoryWriterInterface $categoryWriter,
        CategoryTreeWriter $categoryTreeWriter,
        CategoryQueryContainer $categoryQueryContainer,
        CategoryToLocaleInterface $localeFacade,
        CategoryToTouchInterface $touchFacade
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
        foreach ($demoTree->children() as $row) {
            if ((int) $row->{'root'} === 1) {
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
        $rootNodeTransfer->setNodeOrder((int) $rawNode->{self::NODE_ORDER});

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
        $childNodeTransfer->setNodeOrder((int) $rawNode->{self::NODE_ORDER});

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

        foreach ($locales as $locale) {
            $localeAttributes = $rawNode->xpath('attributes/attribute[@locale_id="' . $locale . '"]');
            $localeAttributes = current($localeAttributes);

            if ($localeAttributes === false) {
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

        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_NAVIGATION, $rootNodeTransfer->getIdCategoryNode());
    }

}

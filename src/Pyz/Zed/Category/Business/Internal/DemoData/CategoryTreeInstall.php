<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business\Internal\DemoData;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataInstaller;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Business\Manager\NodeUrlManagerInterface;
use Spryker\Zed\Category\Business\Model\CategoryWriterInterface;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;

class CategoryTreeInstall extends AbstractDemoDataInstaller
{

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const CATEGORY_KEY = 'key';
    const PARENT_KEY = 'parent_key';
    const IMAGE_NAME = 'image_name';
    const NODE_ORDER = 'order';

    /**
     * @var \Spryker\Zed\Category\Business\Model\CategoryWriter
     */
    protected $categoryWriter;

    /**
     * @var \Spryker\Zed\Category\Business\Tree\CategoryTreeWriter
     */
    protected $categoryTreeWriter;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainer
     */
    protected $queryContainer;

    /**
     * @var \Generated\Shared\Transfer\LocaleTransfer
     */
    protected $locale;

    /**
     * @var \Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var \Pyz\Zed\Category\Business\Manager\NodeUrlManagerInterface
     */
    protected $nodeUrlManager;

    /**
     * @param \Spryker\Zed\Category\Business\Model\CategoryWriterInterface $categoryWriter
     * @param \Spryker\Zed\Category\Business\Tree\CategoryTreeWriter $categoryTreeWriter
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainer $categoryQueryContainer
     * @param \Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface $localeFacade
     * @param \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface $touchFacade
     */
    public function __construct(
        CategoryWriterInterface $categoryWriter,
        CategoryTreeWriter $categoryTreeWriter,
        CategoryQueryContainer $categoryQueryContainer,
        CategoryToLocaleInterface $localeFacade,
        CategoryToTouchInterface $touchFacade,
        NodeUrlManagerInterface $nodeUrlManager
    ) {
        $this->categoryWriter = $categoryWriter;
        $this->categoryTreeWriter = $categoryTreeWriter;
        $this->queryContainer = $categoryQueryContainer;
        $this->localeFacade = $localeFacade;
        $this->locale = $localeFacade->getCurrentLocale();
        $this->touchFacade = $touchFacade;
        $this->nodeUrlManager = $nodeUrlManager;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Tree';
    }

    /**
     * @return void
     */
    public function install()
    {
        $this->notice('This will install a Dummy CategoryTree in the demo shop');

        $demoTree = $this->getDemoTree();

        if ($this->queryContainer->queryRootNode()->count() > 0) {
            $this->notice('Dummy CategoryTree already installed. Skipping.');

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
     *
     * @return void
     */
    protected function write(\SimpleXMLElement $demoTree)
    {
        foreach ($demoTree->children() as $row) {
            if ((int)$row->{'root'} === 1) {
                $this->addRootNode($row);
            } else {
                $this->addChild($row);
            }
        }
    }

    /**
     * @param \SimpleXMLElement $rawNode
     *
     * @return void
     */
    protected function addRootNode(\SimpleXMLElement $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setFkCategory($idCategory);
        $rootNodeTransfer->setNodeOrder((int)$rawNode->{self::NODE_ORDER});
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setIsMain(true);

        $this->createCategoryNodeWithUrls($rootNodeTransfer);

        $this->createRootNavigation($rootNodeTransfer);
    }

    /**
     * @param \SimpleXMLElement $rawNode
     *
     * @return void
     */
    protected function addChild(\SimpleXMLElement $rawNode)
    {
        $idCategory = $this->createCategory($rawNode);

        $childNodeTransfer = new NodeTransfer();
        $childNodeTransfer->setFkCategory($idCategory);
        $childNodeTransfer->setFkParentCategoryNode($this->getParentId($rawNode));
        $childNodeTransfer->setNodeOrder((int)$rawNode->{self::NODE_ORDER});
        $childNodeTransfer->setIsMain(true);
        $childNodeTransfer->setIsRoot(false);

        $this->createCategoryNodeWithUrls($childNodeTransfer);
    }

    /**
     * @param \SimpleXMLElement $rawNode
     *
     * @return bool
     */
    protected function getParentId(\SimpleXMLElement $rawNode)
    {
        $nodeQuery = $this->queryContainer->queryNodeByCategoryKey((string)$rawNode->{self::PARENT_KEY});
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
        $categoryTransfer->setCategoryKey((string)$rawNode->{self::CATEGORY_KEY});

        $locales = $this->localeFacade->getAvailableLocales();
        $idCategory = null;

        foreach ($locales as $locale) {
            $localeAttributes = $rawNode->xpath('attributes/attribute[@locale_id="' . $locale . '"]');
            $localeAttributes = current($localeAttributes);

            if ($localeAttributes === false) {
                continue;
            }

            $categoryTransfer->setName((string)$localeAttributes->{self::CATEGORY_NAME});
            $categoryTransfer->setCategoryImageName((string)$localeAttributes->{self::IMAGE_NAME});

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
     * @param \Generated\Shared\Transfer\NodeTransfer $rootNodeTransfer
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


    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNodeWithUrls(NodeTransfer $nodeTransfer)
    {
        $this->createCategoryNode($nodeTransfer);

        foreach ($this->localeFacade->getLocaleCollection() as $localeCode => $localeTransfer) {
            $this->nodeUrlManager->createUrl($nodeTransfer, $localeTransfer);
        }
    }


    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNode(NodeTransfer $nodeTransfer)
    {
        $idNode = $this->categoryTreeWriter->createCategoryNode($nodeTransfer, new LocaleTransfer(), false);
        $nodeTransfer->setIdCategoryNode($idNode);

        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
    }

}

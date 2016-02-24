<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Category;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Installer\Business\Exception\InvalidDataException;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use Spryker\Zed\Url\Business\UrlFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryImporter extends AbstractIcecatImporter
{

    const PARENT_KEY = 'parentKey';
    const UCATID = 'ucatid';
    const LOW_PIC = 'low_pic';

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected $urlFacade;

    /**
     * @var \Pyz\Zed\Category\Business\Manager\NodeUrlManager
     */
    protected $nodeUrlManager;

    /**
     * @var array
     */
    protected $cacheParents = [];

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     *
     * @return void
     */
    public function setCategoryFacade(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     *
     * @return void
     */
    public function setTouchFacade(TouchFacadeInterface $touchFacade)
    {
        $this->touchFacade = $touchFacade;
    }

    /**
     * @param \Spryker\Zed\Url\Business\UrlFacadeInterface $urlFacade
     *
     * @return void
     */
    public function setUrlFacade(UrlFacadeInterface $urlFacade)
    {
        $this->urlFacade = $urlFacade;
    }

    /**
     * @param \Pyz\Zed\Category\Business\Manager\NodeUrlManager $nodeUrlManager
     *
     * @return void
     */
    public function setNodeUrlManager(NodeUrlManager $nodeUrlManager)
    {
        $this->nodeUrlManager = $nodeUrlManager;
    }

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     *
     * @return void
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @return bool
     */
    public function canImport()
    {
        return count($this->categoryFacade->getRootNodes()) === 0;
    }

    /**
     * @param array $columns
     * @param array $data
     */
    public function importOne(array $columns, array $data)
    {
        $csvData = $this->generateCsvItem($columns, $data);
        $category = $this->format($csvData);
        $this->importCategory($category);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        $categoryData = [];
        foreach ($this->localeManager->getLocaleCollection() as $code => $localeTransfer) {
            $nameKey = 'category_name.' . $code;
            $descriptionKey = 'category_description.' . $code;

            $categoryData[$code] = [
                CategoryTransfer::NAME => $data[$nameKey],
                CategoryTransfer::CATEGORY_KEY => $data[self::UCATID],
                CategoryTransfer::CATEGORY_IMAGE_NAME => $data[self::LOW_PIC],
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => true,
                CategoryTransfer::IS_IN_MENU => false,
                CategoryTransfer::META_DESCRIPTION => $data[$descriptionKey],
                CategoryTransfer::META_TITLE => $data[$nameKey],
            ];
        }

        return $categoryData;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importCategory(array $data)
    {
        $idCategory = $this->createCategory($data);

        $nodeTransfer = new NodeTransfer();
        $nodeTransfer->setIsRoot(false);
        $nodeTransfer->setIsMain(true);
        $nodeTransfer->setFkCategory($idCategory);
        $nodeTransfer->setFkParentCategoryNode(1);

        $this->createCategoryNode($nodeTransfer);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importRootCategory(array $data)
    {
        $idCategory = $this->createCategory($data);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setIsMain(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $this->createCategoryNodeWithUrls($rootNodeTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNode(NodeTransfer $nodeTransfer)
    {
        $idNode = $this->categoryFacade->createCategoryNode($nodeTransfer, new LocaleTransfer(), false);
        $nodeTransfer->setIdCategoryNode($idNode);

        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
    }

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $nodeTransfer
     *
     * @return void
     */
    protected function createCategoryNodeWithUrls(NodeTransfer $nodeTransfer)
    {
        $this->createCategoryNode($nodeTransfer);

        foreach ($this->localeManager->getLocaleCollection() as $localeCode => $localeTransfer) {
            $this->nodeUrlManager->createUrl($nodeTransfer, $localeTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @throws \Pyz\Zed\Installer\Business\Exception\InvalidDataException
     * @return int|null
     */
    protected function createCategory(array $data)
    {
        $idCategory = null;
        $locales = $this->localeManager->getLocaleCollection();

        foreach ($locales as $code => $localeTransfer) {
            $categoryTransfer = new CategoryTransfer();
            $categoryTransfer->fromArray($data[$code]);

            $name = trim($categoryTransfer->getName());
            if ($name === '') {
                throw new InvalidDataException(
                    sprintf('Category name is empty for category with key "%"', $categoryTransfer->getCategoryKey())
                );
            }

            if ($idCategory === null) {
                $idCategory = $this->categoryFacade->createCategory($categoryTransfer, $localeTransfer);
            } else {
                $categoryTransfer->setIdCategory($idCategory);
                $this->categoryFacade->addCategoryAttribute($categoryTransfer, $localeTransfer);
            }
        }

        return $idCategory;
    }

    /**
     * TODO move root node logic into RootCategoryImporter
     *
     * @param \Generated\Shared\Transfer\NodeTransfer $rootNodeTransfer
     *
     * @return void
     */
    protected function touchRootNavigation(NodeTransfer $rootNodeTransfer)
    {
        if (!$rootNodeTransfer->getIsRoot()) {
            return;
        }

        $this->touchFacade->touchActive(InstallerConfig::RESOURCE_NAVIGATION, $rootNodeTransfer->getIdCategoryNode());
    }

    /**
     * TODO move root node logic into RootCategoryImporter
     *
     * @return void
     */
    protected function installRootNodes()
    {
        $rootData = [];
        foreach ($this->localeManager->getLocaleCollection() as $code => $localeTransfer) {
            $rootData[$code] = [
                CategoryTransfer::NAME => 'Demoshop ' . $code,
                CategoryTransfer::CATEGORY_KEY => 'demoshop_root',
                CategoryTransfer::CATEGORY_IMAGE_NAME => '',
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => false,
                CategoryTransfer::IS_IN_MENU => false,
            ];
        }

        $this->importRootCategory($rootData);
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->installRootNodes();
    }

}

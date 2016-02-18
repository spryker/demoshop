<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Pyz\Zed\Category\Business\CategoryFacade;
use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use Spryker\Zed\Url\Business\UrlFacadeInterface;

class CategoryImporter extends AbstractIcecatImporter
{

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacade
     */
    protected $categoryFacade;

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
     * @param \Pyz\Zed\Category\Business\CategoryFacade $categoryFacade
     */
    public function setCategoryFacade(CategoryFacade $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     */
    public function setTouchFacade(TouchFacadeInterface $touchFacade)
    {
        $this->touchFacade = $touchFacade;
    }

    /**
     * @param \Spryker\Zed\Url\Business\UrlFacadeInterface $urlFacade
     */
    public function setUrlFacade(UrlFacadeInterface $urlFacade)
    {
        $this->urlFacade = $urlFacade;
    }

    /**
     * @param \Pyz\Zed\Category\Business\Manager\NodeUrlManager $nodeUrlManager
     */
    public function setNodeUrlManager(NodeUrlManager $nodeUrlManager)
    {
        $this->nodeUrlManager = $nodeUrlManager;
    }

    /**
     * @return bool
     */
    public function canImport()
    {
        return true;

        return count($this->categoryFacade->getRootNodes()) === 0;
    }

    /**
     * @return void
     */
    protected function importData()
    {
        //$this->installRootNodes();

        $csvFile = $this->csvReader->readCsvFile('__categories_done.csv');
        $columns = $this->csvReader->getColumns();

        while (!$csvFile->eof()) {
            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            $rootCategoryData = $this->format($csvData);
            $this->createCategoryWithLocalizedAttributes($rootCategoryData);
            break;
        }
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
            $nameKey = 'category_name.'.$code;
            $descriptionKey = 'category_description.'.$code;

            $categoryData[$code] = [
                CategoryTransfer::NAME => $data[$nameKey],
                CategoryTransfer::CATEGORY_KEY => $data['ucatid'],
                CategoryTransfer::CATEGORY_IMAGE_NAME => $data['low_pic'],
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
     */
    protected function addRootNodesWithLocalizedAttributes(array $data)
    {
        $idCategory = $this->createCategoryWithLocalizedAttributes($data);

        foreach ($this->localeManager->getLocaleCollection() as $localeCode => $localeTransfer) {
            $rootNodeTransfer = new NodeTransfer();
            $rootNodeTransfer->setIsRoot(true);
            $rootNodeTransfer->setIsMain(true);
            $rootNodeTransfer->setFkCategory($idCategory);

            $this->categoryFacade->createCategoryNode($rootNodeTransfer, $localeTransfer);
            $this->createRootNavigation($rootNodeTransfer);
        }
    }

    /**
     * @param array $data
     *
     * @return int|null
     */
    protected function createCategoryWithLocalizedAttributes(array $data)
    {
        $idCategory = null;
        $locales = $this->localeManager->getLocaleCollection();

        foreach ($locales as $code => $localeTransfer) {
            $categoryTransfer = new CategoryTransfer();
            $categoryTransfer->fromArray($data[$code]);

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
     * @param \Generated\Shared\Transfer\NodeTransfer $rootNodeTransfer
     *
     * @return void
     */
    protected function createRootNavigation(NodeTransfer $rootNodeTransfer)
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
                CategoryTransfer::NAME => 'Root ' . $code,
                CategoryTransfer::CATEGORY_KEY => 'demoshop_root',
                CategoryTransfer::CATEGORY_IMAGE_NAME => '',
                CategoryTransfer::IS_ACTIVE => true,
                CategoryTransfer::IS_CLICKABLE => false,
                CategoryTransfer::IS_IN_MENU => false,
            ];
        }

        $this->addRootNodesWithLocalizedAttributes($rootData);
    }

}

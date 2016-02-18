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

    const IS_ROOT = 'is_root';
    const CATEGORY_NAME = 'name';
    const CATEGORY_KEY = 'key';
    const PARENT_KEY = 'parent_key';
    const IMAGE_NAME = 'image_name';

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
     * @return string
     */
    protected function getColumnHeader()
    {
        return 'catid,ucatid,pcatid,low_pic,category_name.en_EN,category_description.en_EN,category_name.de_DE,category_description.de_DE,category_name.fr_FR,category_description.fr_FR';
    }

    /**
     * @return void
     */
    protected function importData()
    {
        $this->addRootNode([
            self::CATEGORY_NAME => 'Root',
            self::CATEGORY_KEY => 'root',
            self::IMAGE_NAME => '',
        ]);

        $csvFile = $this->getCsvFile('__categories_done.csv');

        while (!$csvFile->eof()) {
            $category = $this->format($csvFile->fgetcsv());

            dump($category);
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
        $categoryData = $this->generateCsvItem($data);

        return $categoryData;
    }

    /**
     * @param array $data
     */
    protected function addRootNode(array $data)
    {
        $idCategory = $this->createCategory($data);

        $rootNodeTransfer = new NodeTransfer();
        $rootNodeTransfer->setIsRoot(true);
        $rootNodeTransfer->setFkCategory($idCategory);

        $this->categoryFacade->createCategoryNode($rootNodeTransfer, new LocaleTransfer(), false);

        foreach ($this->localeManager->getLocaleTransferCollection() as $localeCode => $localeTransfer) {
            $this->nodeUrlManager->createUrl($rootNodeTransfer, $localeTransfer);
        }

        $this->createRootNavigation($rootNodeTransfer);
    }

    /**
     * @param array $data
     *
     * @return int|null
     */
    protected function createCategory(array $data)
    {
        $idCategory = null;
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setCategoryKey($data[self::CATEGORY_KEY]);
        $locales = $this->localeManager->getLocaleTransferCollection();

        foreach ($locales as $localeCode => $localeTransfer) {
            $categoryTransfer->setName($data[self::CATEGORY_NAME]);
            $categoryTransfer->setCategoryImageName($data[self::IMAGE_NAME]);

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

}

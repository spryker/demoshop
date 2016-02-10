<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Library\Import\ReaderInterface;
use Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;

class ProductCategoryMappingInstall extends AbstractInstaller
{

    /**
     * @var \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var \Spryker\Zed\Library\Import\ReaderInterface
     */
    protected $reader;

    /**
     * @var string
     */
    protected $csvPath;

    /**
     * @var \Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface
     */
    protected $productCategoryManager;

    /**
     * @var \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface
     */
    protected $categoryFacade;

    /**
     * @param \Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface $productCategoryManager
     * @param \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface $categoryFacade
     * @param \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface $productFacade
     * @param \Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface $localeFacade
     * @param \Spryker\Zed\Library\Import\ReaderInterface $reader
     * @param string $csvPath
     */
    public function __construct(
        ProductCategoryManagerInterface $productCategoryManager,
        ProductCategoryToCategoryInterface $categoryFacade,
        ProductCategoryToProductInterface $productFacade,
        ProductCategoryToLocaleInterface $localeFacade,
        ReaderInterface $reader,
        $csvPath
    ) {
        $this->localeFacade = $localeFacade;
        $this->reader = $reader;
        $this->csvPath = $csvPath;
        $this->productCategoryManager = $productCategoryManager;
        $this->productFacade = $productFacade;
        $this->categoryFacade = $categoryFacade;
    }

    public function install()
    {
        $currentLocale = $this->localeFacade->getCurrentLocale();
        $this->installProductCategories($currentLocale);
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function installProductCategories(LocaleTransfer $locale)
    {
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $sku = $demoProductCategory['sku'];
            if (!$this->productFacade->hasProductAbstract($sku)) {
                continue;
            }

            $categoryName = $demoProductCategory['category'];
            if (!$this->categoryFacade->hasCategoryNode($categoryName, $locale)) {
                continue;
            }

            if (!$this->productCategoryManager->hasProductCategoryMapping($sku, $categoryName, $locale)) {
                $categoryNodeIds[] = $this->productCategoryManager
                    ->createProductCategoryMapping($sku, $categoryName, $locale);
            }
        }
    }

    /**
     * @return array
     */
    protected function getDemoProductCategories()
    {
        return $this->reader->read($this->csvPath)->getData();
    }

}

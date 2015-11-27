<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\Exception\PropelException;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\ReaderInterface;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;

class ProductCategoryMappingInstall extends AbstractInstaller
{

    /**
     * @var ProductCategoryToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * @var string
     */
    protected $csvPath;

    /**
     * @var ProductCategoryManagerInterface
     */
    protected $productCategoryManager;

    /**
     * @var ProductCategoryToProductInterface
     */
    protected $productFacade;

    /**
     * @var ProductCategoryToCategoryInterface
     */
    protected $categoryFacade;

    /**
     * @param ProductCategoryManagerInterface $productCategoryManager
     * @param ProductCategoryToCategoryInterface $categoryFacade
     * @param ProductCategoryToProductInterface $productFacade
     * @param ProductCategoryToLocaleInterface $localeFacade
     * @param ReaderInterface $reader
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

    // TODO: Check if this is really needed
    public function install()
    {
        $currentLocale = $this->localeFacade->getCurrentLocale();
        $this->installProductCategories($currentLocale);
    }

    /**
     * @param LocaleTransfer $locale
     *
     * @throws PropelException
     */
    protected function installProductCategories(LocaleTransfer $locale)
    {
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $sku = $demoProductCategory['sku'];
            if (!$this->productFacade->hasAbstractProduct($sku)) {
                continue;
            }

            $categoryName = $demoProductCategory['category'];
            if (!$this->categoryFacade->hasCategoryNode($categoryName, $locale)) {
                continue;
            }

            if (!$this->productCategoryManager->hasProductCategoryMapping($sku, $categoryName, $locale)) {
                $categoryNodeIds[] = $this->productCategoryManager
                    ->createProductCategoryMapping($sku, $categoryName, $locale)
                ;
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

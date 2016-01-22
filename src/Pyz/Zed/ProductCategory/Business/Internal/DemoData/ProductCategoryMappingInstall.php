<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Library\Import\ReaderInterface;
use Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;

class ProductCategoryMappingInstall extends AbstractInstaller
{

    const SKU = 'sku';
    const CATEGORY_KEY = 'category_key';

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
            $sku = $demoProductCategory[self::SKU];
            if (!$this->productFacade->hasProductAbstract($sku)) {
                continue;
            }

            $category = $this->categoryFacade->getCategoryByKey($demoProductCategory[self::CATEGORY_KEY]);
            if (!$category) {
                continue;
            }

            if (!$this->productCategoryManager->hasProductCategoryMapping($sku, $category->getName(), $locale)) {
                $categoryNodeIds[] = $this->productCategoryManager
                    ->createProductCategoryMapping($sku, $category->getName(), $locale);
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

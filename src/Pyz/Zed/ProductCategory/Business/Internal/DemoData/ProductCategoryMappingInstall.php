<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataInstaller;
use Spryker\Zed\Library\Import\ReaderInterface;
use Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;

class ProductCategoryMappingInstall extends AbstractDemoDataInstaller
{

    const SKU = 'sku';
    const CATEGORY_KEY = 'category_key';

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

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Category';
    }

    /**
     * @return void
     */
    public function install()
    {
        $currentLocale = $this->localeFacade->getCurrentLocale();
        $this->installProductCategories($currentLocale);
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function installProductCategories(LocaleTransfer $locale)
    {
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $sku = $demoProductCategory[self::SKU];
            if (!$this->productFacade->hasProductAbstract($sku)) {
                continue;
            }

            $category = $this->categoryFacade->getCategoryByKey($demoProductCategory[self::CATEGORY_KEY], $locale->getIdLocale());
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

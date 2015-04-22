<?php

namespace Pyz\Zed\Installer\Business\Internal\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Library\Import\ReaderInterface;
use ProjectA\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use Propel\Runtime\Exception\PropelException;

class ProductCategoryInstaller extends AbstractInstaller
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

    public function install()
    {
        $currentIdLocale = $this->localeFacade->getCurrentIdLocale();
        $this->installProductCategories($currentIdLocale);
    }

    /**
     * @param int $localeId
     *
     * @throws PropelException
     */
    protected function installProductCategories($localeId)
    {
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $sku = $demoProductCategory['sku'];
            if (!$this->productFacade->hasConcreteProduct($sku)) {
                continue;
            }

            $categoryName = $demoProductCategory['category'];
            if (!$this->categoryFacade->hasCategoryNode($categoryName, $localeId)) {
                continue;
            }

            if (!$this->productCategoryManager->hasProductCategoryMapping($sku, $categoryName, $localeId)) {
                $categoryNodeIds[] = $this->productCategoryManager
                    ->createProductCategoryMapping($sku, $categoryName, $localeId)
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

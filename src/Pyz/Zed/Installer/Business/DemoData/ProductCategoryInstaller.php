<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Category\Business\CategoryFacade;
use ProjectA\Zed\Product\Business\ProductFacade;
use ProjectA\Zed\ProductCategory\Business\ProductCategoryFacade;
use Propel\Runtime\Exception\PropelException;
use SprykerCore\Zed\Locale\Business\LocaleFacade;

class ProductCategoryInstaller extends AbstractInstaller
{

    /**
     * @var ProductCategoryToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var ProductCategoryFacade
     */
    protected $productCategoryFacade;

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var CategoryFacade
     */
    protected $categoryFacade;

    /**
     * @var array
     */
    protected $rawProductData;

    /**
     * @param ProductCategoryFacade $productCategoryFacade
     * @param CategoryFacade $categoryFacade
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param array $rawProductData
     */
    public function __construct(
        ProductCategoryFacade $productCategoryFacade,
        CategoryFacade $categoryFacade,
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        $rawProductData
    ) {
        $this->productCategoryFacade = $productCategoryFacade;
        $this->categoryFacade = $categoryFacade;
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->rawProductData = $rawProductData;
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
        foreach ($this->rawProductData as $rawProduct) {
            $sku = $rawProduct['sku'];
            if (!$this->productFacade->hasConcreteProduct($sku)) {
                continue;
            }

            $categoryName = $rawProduct['category'];
            if (!$this->categoryFacade->hasCategoryNode($categoryName, $localeId)) {
                continue;
            }

            if (!$this->productCategoryFacade->hasProductCategoryMapping($sku, $categoryName, $localeId)) {
                $categoryNodeIds[] = $this->productCategoryFacade
                    ->createProductCategoryMapping($sku, $categoryName, $localeId);
            }
        }
    }
}

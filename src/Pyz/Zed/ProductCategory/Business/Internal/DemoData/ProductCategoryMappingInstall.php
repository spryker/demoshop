<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use ProjectA\Zed\Category\Persistence\Propel\SpyCategoryNode;
use ProjectA\Zed\Category\Persistence\Propel\SpyCategoryNodeQuery;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Product\Persistence\Propel\SpyProductQuery;
use ProjectA\Zed\ProductCategory\Persistence\Propel\SpyProductCategory;
use ProjectA\Zed\ProductCategory\Persistence\Propel\SpyProductCategoryQuery;
use SprykerCore\Zed\Locale\Business\LocaleFacade;
use SprykerCore\Zed\Locale\Persistence\Propel\SpyLocaleQuery;
use SprykerCore\Zed\Touch\Business\TouchFacade;

class ProductCategoryMappingInstall extends AbstractInstaller
{

    /**
     * @var LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var TouchFacade
     */
    protected $touchFacade;

    /**
     * @param LocaleFacade $localeFacade
     * @param TouchFacade $touchFacade
     */
    public function __construct(LocaleFacade $localeFacade, TouchFacade $touchFacade)
    {
        $this->localeFacade = $localeFacade;
        $this->touchFacade = $touchFacade;
    }

    public function install()
    {
        $locale = SpyLocaleQuery::create()
            ->findOneByLocaleName($this->localeFacade->getCurrentLocale());

        $categoryNodeIds = $this->installProductCategories($locale);
        $this->touchProductCategories($categoryNodeIds);
    }

    /**
     * @param $locale
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function installProductCategories($locale)
    {
        $categoryNodeIds = [];
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $productId = $this->getProductId($demoProductCategory['sku']);
            $categoryNodeId = $this->getCategoryNodeId($demoProductCategory['category'], $locale);

            if ($productId && $categoryNodeId && !($this->relationExists($productId, $categoryNodeId))) {
                $productCategory = new SpyProductCategory();
                $productCategory->setFkProduct($productId);
                $productCategory->setFkCategoryNode($categoryNodeId);
                $productCategory->save();

                $categoryNodeIds[] = $productCategory->getFkCategoryNode();
            }
        }

        return $categoryNodeIds;
    }

    /**
     * @return array
     */
    protected function getDemoProductCategories()
    {
        $reader = new CsvFileReader();

        return $reader->read(__DIR__ . '/demo-product-category-data.csv')->getData();
    }

    /**
     * @param array $categoryNodeIds
     */
    protected function touchProductCategories(array $categoryNodeIds)
    {
        /** @var \ProjectA\Zed\ProductCategory\Persistence\Propel\SpyProductCategory $productCategory */
        foreach ($categoryNodeIds as $categoryNodeId) {
            $this->touchFacade->touchActive('product-category', $categoryNodeId);
        }
    }

    /**
     * @param $productSku
     * @return int|null
     */
    protected function getProductId($productSku)
    {
        $productEntity = SpyProductQuery::create()
            ->findOneBySku($productSku);

        if ($productEntity) {
            return $productEntity->getProductId();
        }

        return null;
    }

    /**
     * @param $categoryName
     * @param $locale
     * @return int|null
     */
    protected function getCategoryNodeId($categoryName, $locale)
    {
        $categoryNodeEntity = SpyCategoryNodeQuery::create()
            ->useCategoryQuery()
                ->useAttributeQuery()
                    ->filterByLocale($locale)
                    ->filterByName($categoryName)
                ->endUse()
            ->endUse()
            ->findOne();

        if ($categoryNodeEntity instanceof SpyCategoryNode) {
            return $categoryNodeEntity->getIdCategoryNode();
        }

        return null;
    }

    /**
     * @param int $productId
     * @param int $categoryNodeId
     *
     * @return bool
     */
    private function relationExists($productId, $categoryNodeId)
    {
        return SpyProductCategoryQuery::create()
            ->filterByFkProduct($productId)
            ->filterByFkCategoryNode($categoryNodeId)
            ->count() > 0;
    }
}

<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;

/**
 * Class ProductCategoryMappingInstall
 * @package Pyz\Zed\ProductCategory\Business\Internal\DemoData
 */
class ProductCategoryMappingInstall implements DemoDataInstallInterface
{

    /**
     * @param Console $console
     */
    public function install(Console $console)
    {
        /** @var AutoCompletion $locator */
        $locator = new Locator();
        //we should use the locale facade to get the current Locale
        $localeFacade = $locator->locale()->facade();
        $locale = \SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()
            ->findOneByLocaleName($localeFacade->getCurrentLocale());
        $categoryNodeIds = $this->installProductCategories($locale);
        $this->touchProductCategories($categoryNodeIds);
    }

    /**
     * @param $locale
     * @return array
     * @throws \Exception
     * @throws \PropelException
     */
    protected function installProductCategories($locale)
    {
        $categoryNodeIds = [];
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $productId = $this->getProductId($demoProductCategory['sku']);
            $categoryNodeId = $this->getCategoryNodeId($demoProductCategory['category'], $locale);

            if ($productId && $categoryNodeId && !($this->relationExists($productId, $categoryNodeId))) {
                $productCategory = new \ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory();
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
     * @throws \Exception
     * @throws \PropelException
     */
    protected function touchProductCategories(array $categoryNodeIds)
    {
        /** @var AutoCompletion $locator */
        $locator = new Locator();
        $touchFacade = $locator->touch()->facade();

        /** @var \ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory $productCategory */
        foreach ($categoryNodeIds as $categoryNodeId) {
            $touchFacade->touchActive('product-category', $categoryNodeId);
        }
    }

    /**
     * @param $productSku
     * @return int|null
     */
    protected function getProductId($productSku)
    {
        $productEntity = \ProjectA_Zed_Product_Persistence_Propel_PacProductQuery::create()
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
        $categoryNodeEntity = \ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNodeQuery::create()
            ->useCategoryQuery()
                ->useAttributeQuery()
                    ->filterByLocale($locale)
                    ->filterByName($categoryName)
                ->endUse()
            ->endUse()
            ->findOne();
        if ($categoryNodeEntity instanceof \ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryNode) {
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
        return \ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategoryQuery::create()
            ->filterByFkProduct($productId)
            ->filterByFkCategoryNode($categoryNodeId)
            ->exists();
    }
}

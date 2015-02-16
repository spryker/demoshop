<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
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
        $locale = \ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale();
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
        $localeEntity = \SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery::create()
            ->findOneByLocaleName($locale);

        $categoryNodeIds = [];
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $productId = $this->getProductId($demoProductCategory['sku']);
            $categoryNodeId = $this->getCategoryNodeId($demoProductCategory['category'], $localeEntity);

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
        /** @var \ProjectA_Zed_ProductCategory_Persistence_Propel_PacProductCategory $productCategory */
        foreach ($categoryNodeIds as $categoryNodeId) {
            $touchedProduct = \SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery::create()
                ->filterByItemId($categoryNodeId)
                ->filterByItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
                ->filterByItemType('product-category')
                ->findOne();

            if (!$touchedProduct) {
                $touchedProduct = new \SprykerCore_Zed_Touch_Persistence_Propel_PacTouch();
            }

            $touchedProduct->setItemType('product-category');
            $touchedProduct->setItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE);
            $touchedProduct->setTouched(new \DateTime());
            $touchedProduct->setItemId($categoryNodeId);
            $touchedProduct->save();
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
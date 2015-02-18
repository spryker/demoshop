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
        $categoryNodeIds = [];
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $productId = $this->getProductId($demoProductCategory['sku']);
            $categoryNodeId = $this->getCategoryNodeId($demoProductCategory['category'], $locale);

            if ($productId && $categoryNodeId && !($this->relationExists($productId, $categoryNodeId))) {
                $productCategory = new \ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategory();
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
        /** @var \ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategory $productCategory */
        foreach ($categoryNodeIds as $categoryNodeId) {
            $touchedProduct = \ProjectA\Zed\FrontendExporter\Persistence\Propel\PacFrontendExporterTouchQuery::create()
                ->filterByItemId($categoryNodeId)
                ->filterByExportType(\ProjectA\Zed\FrontendExporter\Persistence\Propel\Map\PacFrontendExporterTouchTableMap::COL_EXPORT_TYPE_SEARCH)
                ->filterByItemEvent(\ProjectA\Zed\FrontendExporter\Persistence\Propel\Map\PacFrontendExporterTouchTableMap::COL_ITEM_EVENT_ACTIVE)
                ->filterByItemType('product-category')
                ->findOne();

            if (!$touchedProduct) {
                $touchedProduct = new \ProjectA\Zed\FrontendExporter\Persistence\Propel\PacFrontendExporterTouch();
            }

            $touchedProduct->setItemType('product-category');
            $touchedProduct->setItemEvent(\ProjectA\Zed\FrontendExporter\Persistence\Propel\Map\PacFrontendExporterTouchTableMap::COL_ITEM_EVENT_ACTIVE);
            $touchedProduct->setExportType(\ProjectA\Zed\FrontendExporter\Persistence\Propel\Map\PacFrontendExporterTouchTableMap::COL_EXPORT_TYPE_SEARCH);

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
        $productEntity = \ProjectA\Zed\Product\Persistence\Propel\PacProductQuery::create()
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
        $categoryNodeEntity = \ProjectA\Zed\CategoryTree\Persistence\Propel\PacCategoryNodeQuery::create()
            ->useCategoryQuery()
                ->useAttributeQuery()
                    ->filterByLocale($locale)
                    ->filterByName($categoryName)
                ->endUse()
            ->endUse()
            ->findOne();

        if ($categoryNodeEntity instanceof \ProjectA\Zed\CategoryTree\Persistence\Propel\PacCategoryNode) {
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
        return \ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategoryQuery::create()
            ->filterByFkProduct($productId)
            ->filterByFkCategoryNode($categoryNodeId)
            ->exists();
    }
}

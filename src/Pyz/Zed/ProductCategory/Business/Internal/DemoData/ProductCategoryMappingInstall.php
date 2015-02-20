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
        /** @var AutoCompletion $locator */
        $locator = new Locator();
        $touchFacade = $locator->touch()->facade();

        /** @var \ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategory $productCategory */
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

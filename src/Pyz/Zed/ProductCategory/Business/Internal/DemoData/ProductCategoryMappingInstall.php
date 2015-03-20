<?php

namespace Pyz\Zed\ProductCategory\Business\Internal\DemoData;

use ProjectA\Zed\Category\Persistence\Propel\PacCategoryNode;
use ProjectA\Zed\Category\Persistence\Propel\PacCategoryNodeQuery;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Product\Persistence\Propel\PacProductQuery;
use ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategory;
use ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategoryQuery;
use Propel\Runtime\Exception\PropelException;
use SprykerCore\Zed\Locale\Business\LocaleFacade;
use SprykerCore\Zed\Locale\Persistence\Propel\PacLocaleQuery;
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
        $locale = PacLocaleQuery::create()
            ->findOneByLocaleName($this->localeFacade->getCurrentLocale());

        $categoryNodeIds = $this->installProductCategories($locale);
        $this->touchProductCategories($categoryNodeIds);
    }

    /**
     * @param $locale
     * @return array
     * @throws PropelException
     */
    protected function installProductCategories($locale)
    {
        $categoryNodeIds = [];
        foreach ($this->getDemoProductCategories() as $demoProductCategory) {
            $productId = $this->getProductId($demoProductCategory['sku']);
            $categoryNodeId = $this->getCategoryNodeId($demoProductCategory['category'], $locale);

            if ($productId && $categoryNodeId && !($this->relationExists($productId, $categoryNodeId))) {
                $productCategory = new PacProductCategory();
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
        /** @var \ProjectA\Zed\ProductCategory\Persistence\Propel\PacProductCategory $productCategory */
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
        $productEntity = PacProductQuery::create()
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
        $categoryNodeEntity = PacCategoryNodeQuery::create()
            ->useCategoryQuery()
                ->useAttributeQuery()
                    ->filterByLocale($locale)
                    ->filterByName($categoryName)
                ->endUse()
            ->endUse()
            ->findOne();

        if ($categoryNodeEntity instanceof PacCategoryNode) {
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
        return PacProductCategoryQuery::create()
            ->filterByFkProduct($productId)
            ->filterByFkCategoryNode($categoryNodeId)
            ->count() > 0;
    }
}

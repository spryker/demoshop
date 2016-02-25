<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Orm\Zed\Category\Persistence\Base\SpyCategoryQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Product\Business\ProductFacadeInterface;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductCategoryImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variantId';
    const CATEGORY_KEY = 'category_key';

    /**
     * @var \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected $categoryFacade;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Pyz\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Pyz\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
     */
    protected $productCategoryFacade;

    /**
     * @var \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected $productCategoryQueryContainer;

    /**
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var array
     */
    protected $cacheCategories = [];

    /**
     * @var array
     */
    protected $cacheNodes = [];

    /**
     * @var SpyCategoryNode
     */
    protected $defaultRootNode;

    /**
     * @param \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     */
    public function setProductCategoryQueryContainer(ProductCategoryQueryContainerInterface $productCategoryQueryContainer)
    {
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
    }

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     */
    public function setCategoryFacade(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param ProductFacadeInterface $productFacade
     */
    public function setProductFacade(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function setProductQueryContainer(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param ProductCategoryFacadeInterface $productCategoryFacade
     */
    public function setProductCategoryFacade(ProductCategoryFacadeInterface $productCategoryFacade)
    {
        $this->productCategoryFacade = $productCategoryFacade;
    }

    /**
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     *
     * @return void
     */
    public function setTouchFacade(TouchFacadeInterface $touchFacade)
    {
        $this->touchFacade = $touchFacade;
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductCategoryQuery::create();
        return $query->count() > 0;
    }

    /**
     * @return SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();
        }

        return $this->defaultRootNode;
    }

    /**
     * @param array $columns
     * @param array $data
     * @throws \Propel\Runtime\Exception\PropelException
     * @internal param array $extraData
     *
     */
    public function importOne(array $columns, array $data)
    {
        $csvData = $this->generateCsvItem($columns, $data);
        if ($this->hasVariants($csvData[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($csvData);

        $productAbstract = $this->productQueryContainer
            ->queryProductAbstractBySku($product[self::SKU])
            ->findOne();

        if (!$productAbstract) {
            return;
        }

        $idCategory = null;
        $idNode = null;
        if (!array_key_exists($product[self::CATEGORY_KEY], $this->cacheCategories)) {
            $categoryQuery = $this->categoryQueryContainer
                ->queryCategoryByKey($product[self::CATEGORY_KEY])
                ->useNodeQuery()
                    ->filterByIsMain(true)
                ->endUse()
            ;
            $category = $categoryQuery->findOne();
            if ($category) {
                $idCategory = $category->getIdCategory();
                $idNode = $category->getNodes()->getFirst()->getIdCategoryNode();
            }
            else {
                $idCategory = $this->getRootNode()->getCategory()->getIdCategory();
                $idNode = $this->getRootNode()->getIdCategoryNode();
            }

            $this->cacheCategories[self::CATEGORY_KEY] = $idCategory;
            $this->cacheNodes[self::CATEGORY_KEY] = $idNode;
        }
        else {
            $idCategory = $this->cacheCategories[self::CATEGORY_KEY];
            $idNode = $this->cacheNodes[self::CATEGORY_KEY];
        }

        if (!$idCategory || !$idNode) {
            return;
        }

        $mappingEntity = new SpyProductCategory();
        $mappingEntity
            ->setFkProductAbstract($productAbstract->getIdProductAbstract())
            ->setFkCategory($idCategory);

        $mappingEntity->save();

        $this->touchFacade->touchActive(ProductConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT, $productAbstract->getIdProductAbstract());
        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return intval($variant) > 1;
    }

    /**
     * @param array $productConcreteCollection
     * @param int $idProductAbstract
     */
    protected function createProductConcreteCollection(array $productConcreteCollection, $idProductAbstract)
    {
        foreach ($productConcreteCollection as $productConcrete) {
            $this->productFacade->createProductConcrete($productConcrete, $idProductAbstract);
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

}

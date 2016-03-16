<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat\Importer\Product;

use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use Pyz\Zed\Category\Business\CategoryFacadeInterface;
use Pyz\Zed\Importer\Business\Icecat\Importer\AbstractIcecatImporter;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductCategoryImporter extends AbstractIcecatImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variant_id';
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
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
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
     * @var \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected $defaultRootNode;

    /**
     * @param \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     *
     * @return void
     */
    public function setProductCategoryQueryContainer(ProductCategoryQueryContainerInterface $productCategoryQueryContainer)
    {
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
    }

    /**
     * @param \Pyz\Zed\Category\Business\CategoryFacadeInterface $categoryFacade
     *
     * @return void
     */
    public function setCategoryFacade(CategoryFacadeInterface $categoryFacade)
    {
        $this->categoryFacade = $categoryFacade;
    }

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     *
     * @return void
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     *
     * @return void
     */
    public function setProductFacade(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     *
     * @return void
     */
    public function setProductQueryContainer(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param \Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface $productCategoryFacade
     *
     * @return void
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
     * @return string
     */
    public function getTitle()
    {
        return 'Product Category';
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
     * @DRY
     *
     * @see \Pyz\Zed\Installer\Business\Icecat\Importer\Category\CategoryHierarchyImporter::getRootNode
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected function getRootNode()
    {
        if ($this->defaultRootNode === null) {
            $queryRoot = $this->categoryQueryContainer->queryRootNode();
            $this->defaultRootNode = $queryRoot->findOne();

            if ($this->defaultRootNode === null) {
                throw new \LogicException('Could not find any root nodes');
            }
        }

        return $this->defaultRootNode;
    }

    /**
     * @param array $data
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($data);

        $productAbstract = $this->productQueryContainer
            ->queryProductAbstractBySku($product[self::SKU])
            ->findOne();

        if (!$productAbstract) {
            return;
        }

        $idCategory = null;
        $idNode = null;
        //TODO extract caching into method
        if (!array_key_exists($product[self::CATEGORY_KEY], $this->cacheCategories)) {
            $categoryQuery = $this->categoryQueryContainer
                ->queryCategoryByKey($product[self::CATEGORY_KEY])
                ->useNodeQuery()
                    ->filterByIsMain(true)
                ->endUse();
            $category = $categoryQuery->findOne();
            if ($category) {
                $idCategory = $category->getIdCategory();
                $idNode = $category->getNodes()->getFirst()->getIdCategoryNode();
            } else {
                $idCategory = $this->getRootNode()->getCategory()->getIdCategory();
                $idNode = $this->getRootNode()->getIdCategoryNode();
            }

            $this->cacheCategories[self::CATEGORY_KEY] = $idCategory;
            $this->cacheNodes[self::CATEGORY_KEY] = $idNode;
        } else {
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
        return (int)$variant > 1;
    }

    /**
     * @param array $productConcreteCollection
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function createProductConcreteCollection(array $productConcreteCollection, $idProductAbstract)
    {
        foreach ($productConcreteCollection as $productConcrete) {
            $this->productFacade->createProductConcrete($productConcrete, $idProductAbstract);
        }
    }

}

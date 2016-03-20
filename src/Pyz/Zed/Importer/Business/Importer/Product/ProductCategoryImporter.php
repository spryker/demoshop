<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Touch\Business\TouchFacadeInterface;

class ProductCategoryImporter extends AbstractImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variant_id';
    const CATEGORY_KEY = 'category_key';
    const RESULT_CATEGORY_ID = 'result_category_id';
    const RESULT_NODE_ID = 'result_node_id';

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
     * @var \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $cacheCategories;

    /**
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $cacheNodes;

    /**
     * @var \Orm\Zed\Category\Persistence\SpyCategoryNode
     */
    protected $defaultRootNode;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Touch\Business\TouchFacadeInterface $touchFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        TouchFacadeInterface $touchFacade,
        CategoryQueryContainerInterface $categoryQueryContainer,
        ProductQueryContainerInterface $productQueryContainer
    ) {
        parent::__construct($localeFacade);
        $this->localeFacade = $localeFacade;
        $this->touchFacade = $touchFacade;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productQueryContainer = $productQueryContainer;

        $this->cacheCategories = new Collection([]);
        $this->cacheNodes = new Collection([]);
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
     * @see \Pyz\Zed\Installer\Business\Importer\Category\CategoryHierarchyImporter::getRootNode
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

        $idNodeAndCategory = $this->getIdNodeAndCategory($product[self::CATEGORY_KEY]);
        if (empty($idNodeAndCategory)) {
            return;
        }

        $idCategory = $idNodeAndCategory[self::RESULT_CATEGORY_ID];
        $idNode = $idNodeAndCategory[self::RESULT_NODE_ID];

        $mappingEntity = new SpyProductCategory();
        $mappingEntity
            ->setFkProductAbstract($productAbstract->getIdProductAbstract())
            ->setFkCategory($idCategory);

        $mappingEntity->save();

        $this->touchFacade->touchActive(ProductConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT, $productAbstract->getIdProductAbstract());
        $this->touchFacade->touchActive(CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
    }

    /**
     * @param string $categoryKey
     *
     * @return array
     */
    protected function getIdNodeAndCategory($categoryKey)
    {
        $idCategory = null;
        $idNode = null;

        if (!$this->cacheCategories->has($categoryKey)) {
            $categoryQuery = $this->categoryQueryContainer
                ->queryCategoryByKey($categoryKey)
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

            $this->cacheCategories->set(self::CATEGORY_KEY, $idCategory);
            $this->cacheNodes->set(self::CATEGORY_KEY, $idNode);
        } else {
            $idCategory = $this->cacheCategories->get(self::CATEGORY_KEY);
            $idNode = $this->cacheNodes->get(self::CATEGORY_KEY);
        }

        if (!$idCategory || !$idNode) {
            return [];
        }

        return [
            self::RESULT_CATEGORY_ID => $idCategory,
            self::RESULT_NODE_ID => $idNode
        ];
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

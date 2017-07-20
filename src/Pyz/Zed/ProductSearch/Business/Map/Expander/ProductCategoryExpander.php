<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Expander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Propel\Runtime\Collection\ObjectCollection;
use Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Pyz\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer;
use Pyz\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SortedCategoryQueryExpanderPlugin;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductCategoryExpander implements ProductPageMapExpanderInterface
{

    const RESULT_FIELD_PRODUCT_ORDER = 'product_order';

    /**
     * @var array
     */
    protected static $categoryTree;

    /**
     * @var string
     */
    protected static $categoryName;

    /**
     * @var \Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected $productCategoryQueryContainer;

    /**
     * @param \Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     * @param \Pyz\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     */
    public function __construct(
        CategoryQueryContainerInterface $categoryQueryContainer,
        ProductCategoryQueryContainerInterface $productCategoryQueryContainer
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer)
    {
        $directParentCategories = array_map('intval', explode(',', $productData['category_node_ids']));

        $allParentCategories = [];
        foreach ($directParentCategories as $idCategory) {
            $allParentCategories = array_merge(
                $allParentCategories,
                $this->getAllParents($idCategory, $localeTransfer)
            );
        }

        $allParentCategories = array_values(array_unique($allParentCategories));

        $pageMapBuilder->addCategory($pageMapTransfer, $allParentCategories, $directParentCategories);

        $this->setFullTextSearch(
            $pageMapBuilder,
            $pageMapTransfer,
            $allParentCategories,
            $directParentCategories,
            $localeTransfer
        );

        $this->setSorting(
            $pageMapBuilder,
            $pageMapTransfer,
            $allParentCategories,
            $productData['id_product_abstract'],
            $localeTransfer
        );

        return $pageMapTransfer;
    }

    /**
     * @param int $idCategoryNode
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return array
     */
    protected function getAllParents($idCategoryNode, LocaleTransfer $localeTransfer)
    {
        if (static::$categoryTree === null) {
            $this->loadTree($localeTransfer);
        }

        return static::$categoryTree[$idCategoryNode];
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function loadTree(LocaleTransfer $localeTransfer)
    {
        static::$categoryTree = [];

        $categoryNodes = $this->categoryQueryContainer
            ->queryCategoryNode($localeTransfer->getIdLocale())
            ->find();

        foreach ($categoryNodes as $categoryNodeEntity) {
            $pathData = $this->categoryQueryContainer
                ->queryPath($categoryNodeEntity->getIdCategoryNode(), $localeTransfer->getIdLocale(), false)
                ->find();

            static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()] = [];

            foreach ($pathData as $path) {
                $idCategory = (int)$path['id_category_node'];
                if (!in_array($idCategory, static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()])) {
                    static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()][] = $idCategory;
                }
            }
        }
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $allParentCategories
     * @param array $directParentCategories
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setFullTextSearch(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $allParentCategories,
        array $directParentCategories,
        LocaleTransfer $localeTransfer
    ) {
        foreach ($directParentCategories as $idCategory) {
            $pageMapBuilder->addFullTextBoosted($pageMapTransfer, $this->getName($idCategory, $localeTransfer));
        }

        foreach ($allParentCategories as $idCategory) {
            if (in_array($idCategory, $directParentCategories)) {
                continue;
            }

            $pageMapBuilder->addFullText($pageMapTransfer, $this->getName($idCategory, $localeTransfer));
        }
    }

    /**
     * @param int $idCategory
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return string
     */
    protected function getName($idCategory, LocaleTransfer $localeTransfer)
    {
        if (static::$categoryName === null) {
            $this->loadNames($localeTransfer);
        }

        return isset(static::$categoryName[$idCategory]) ? static::$categoryName[$idCategory] : null;
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function loadNames(LocaleTransfer $localeTransfer)
    {
        static::$categoryName = [];

        $categoryAttributes = $this
            ->categoryQueryContainer
            ->queryCategoryAttributesByLocale($localeTransfer)
            ->useCategoryQuery()
                ->filterByIsSearchable(true)
            ->endUse()
            ->find();

        foreach ($categoryAttributes as $categoryAttributeEntity) {
            static::$categoryName[$categoryAttributeEntity->getFkCategory()] = $categoryAttributeEntity->getName();
        }
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param int[] $directParentCategories
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setSorting(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $directParentCategories,
        $idProductAbstract,
        LocaleTransfer $localeTransfer
    ) {
        $productCategoryEntities = $this->findNodeEntitiesWithProductOrderPosition(
            $directParentCategories,
            $idProductAbstract
        );

        $this->setSortingForDirectParents(
            $pageMapBuilder,
            $pageMapTransfer,
            $productCategoryEntities,
            $localeTransfer
        );
    }

    /**
     * @param int[] $directParentCategories
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\ProductCategory\Persistence\SpyProductCategory[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function findNodeEntitiesWithProductOrderPosition(array $directParentCategories, $idProductAbstract)
    {
        return $this
            ->productCategoryQueryContainer
            ->queryProductCategoryMappingsByIdAbstractProductAndIdsCategoryNode(
                $idProductAbstract,
                $directParentCategories
            )
            ->find();
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Orm\Zed\ProductCategory\Persistence\SpyProductCategory[]|\Propel\Runtime\Collection\ObjectCollection $productCategoryEntities
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setSortingForDirectParents(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        ObjectCollection $productCategoryEntities,
        LocaleTransfer $localeTransfer
    ) {
        $maxProductOrder = (pow(2, 31) - 1);

        foreach ($productCategoryEntities as $productCategoryEntity) {
            $idCategoryNode = $productCategoryEntity->getVirtualColumn(
                ProductCategoryQueryContainer::VIRT_COLUMN_ID_CATEGORY_NODE
            );
            $productOrder = (int)$productCategoryEntity->getProductOrder() ?: $maxProductOrder;

            $pageMapBuilder->addIntegerSort(
                $pageMapTransfer,
                SortedCategoryQueryExpanderPlugin::buildSortFieldName($idCategoryNode),
                $productOrder
            );

            $this->setSortingForTreeParents(
                $pageMapBuilder,
                $pageMapTransfer,
                $idCategoryNode,
                $productOrder,
                $localeTransfer
            );
        }
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param int $idCategoryNode
     * @param int $productOrder
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setSortingForTreeParents(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        $idCategoryNode,
        $productOrder,
        LocaleTransfer $localeTransfer
    ) {
        $idsParentCategoryNode = $this->getAllParents($idCategoryNode, $localeTransfer);

        foreach ($idsParentCategoryNode as $idParentCategoryNode) {
            $pageMapBuilder->addIntegerSort(
                $pageMapTransfer,
                SortedCategoryQueryExpanderPlugin::buildSortFieldName($idParentCategoryNode),
                $productOrder
            );
        }
    }

}

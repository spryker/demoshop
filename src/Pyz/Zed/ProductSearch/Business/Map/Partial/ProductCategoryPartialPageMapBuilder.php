<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Partial;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Collection\ObjectCollection;
use Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\SortedCategoryQueryExpanderPlugin;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductCategoryPartialPageMapBuilder
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
     * @param \Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    public function buildPart(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {
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

        $categoryAttributes = $this->categoryQueryContainer
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
        $categoryNodeEntities = $this->findNodeEntitiesWithProductOrderPosition(
            $directParentCategories,
            $idProductAbstract,
            $localeTransfer
        );

        $this->setSortingForDirectParents(
            $pageMapBuilder,
            $pageMapTransfer,
            $categoryNodeEntities,
            $localeTransfer
        );
    }

    /**
     * @param int[] $directParentCategories
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function findNodeEntitiesWithProductOrderPosition(
        array $directParentCategories,
        $idProductAbstract,
        LocaleTransfer $localeTransfer
    ) {
        return $this
            ->categoryQueryContainer
            ->queryCategoryNode($localeTransfer->getIdLocale())
            ->useCategoryQuery()
                ->useSpyProductCategoryQuery()
                    ->filterByFkProductAbstract($idProductAbstract)
                    ->withColumn(
                        SpyProductCategoryTableMap::COL_PRODUCT_ORDER,
                        static::RESULT_FIELD_PRODUCT_ORDER
                    )
                ->endUse()
            ->endUse()
            ->filterByIdCategoryNode($directParentCategories, Criteria::IN)
            ->find();
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Orm\Zed\Category\Persistence\SpyCategoryNode[]|\Propel\Runtime\Collection\ObjectCollection $categoryNodeEntities
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setSortingForDirectParents(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        ObjectCollection $categoryNodeEntities,
        LocaleTransfer $localeTransfer
    ) {
        foreach ($categoryNodeEntities as $categoryNodeEntity) {
            $idCategoryNode = $categoryNodeEntity->getIdCategoryNode();
            $productOrder = (int)$categoryNodeEntity->getVirtualColumn(static::RESULT_FIELD_PRODUCT_ORDER);

            if (!$productOrder) {
                continue;
            }

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

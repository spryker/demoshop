<?php

namespace Pyz\Zed\Collector\Business\Search;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\ProductSearch\Persistence\Map\SpyProductSearchTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Stock\Persistence\Map\SpyStockProductTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;
use Spryker\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use Spryker\Zed\Price\Persistence\PriceQueryContainer;

class ProductCollector extends AbstractPropelCollectorPlugin
{

    /**
     * @var \Spryker\Zed\Price\Persistence\PriceQueryContainer
     */
    private $priceQueryContainer;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @var \Pyz\Zed\ProductSearch\Business\ProductSearchFacade
     */
    private $productSearchFacade;

    /**
     * @param \Spryker\Zed\Price\Persistence\PriceQueryContainer $priceQueryContainer
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainer $categoryQueryContainer
     * @param \Pyz\Zed\ProductSearch\Business\ProductSearchFacade $productSearchFacade
     */
    public function __construct(PriceQueryContainer $priceQueryContainer, CategoryQueryContainer $categoryQueryContainer, ProductSearchFacade $productSearchFacade)
    {
        $this->priceQueryContainer = $priceQueryContainer;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @return string
     */
    protected function getTouchItemType()
    {
        return 'product_abstract';
    }

    /**
     * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $baseQuery
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Orm\Zed\Touch\Persistence\SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->clearSelectColumns();

        // Abstract & concrete product - including localized attributes & url
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyProductTableMap::COL_FK_PRODUCT_ABSTRACT,
                Criteria::LEFT_JOIN
            ),
            'productConcreteJoin'
        );

        $baseQuery->addJoinCondition(
            'productConcreteJoin',
            SpyProductTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product.sku)',
            'concrete_skus'
        );

        $baseQuery->addJoin(
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $locale->getIdLocale(),
            Criteria::EQUAL
        );
        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->addJoinObject(
            (new Join(
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyUrlTableMap::COL_FK_RESOURCE_PRODUCT_ABSTRACT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('product_urls'),
            'productUrlsJoin'
        );

        $baseQuery->addJoinCondition(
            'productUrlsJoin',
            'product_urls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductLocalizedAttributesTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'productAttributesJoin'
        );

        $baseQuery->addJoinCondition(
            'productAttributesJoin',
            SpyProductLocalizedAttributesTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, 'id_product_abstract');

        $baseQuery->withColumn(
            SpyProductAbstractTableMap::COL_ATTRIBUTES,
            'abstract_attributes'
        );
        $baseQuery->withColumn(
            SpyProductAbstractLocalizedAttributesTableMap::COL_ATTRIBUTES,
            'abstract_localized_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product.attributes SEPARATOR '$%')",
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product_localized_attributes.attributes SEPARATOR '$%')",
            'concrete_localized_attributes'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(product_urls.url)',
            'product_urls'
        );
        $baseQuery->withColumn(
            SpyProductAbstractLocalizedAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product_localized_attributes.name)',
            'concrete_names'
        );

        $baseQuery->withColumn(SpyProductAbstractTableMap::COL_SKU, 'abstract_sku');
        $baseQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, 'id_product_abstract');

        $baseQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductSearchTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'searchableJoin'
        );
        $baseQuery->addJoinCondition(
            'searchableJoin',
            SpyProductSearchTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );
        $baseQuery->addAnd(
            SpyProductSearchTableMap::COL_IS_SEARCHABLE,
            true,
            Criteria::EQUAL
        );

        // Product availability
        $baseQuery->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyStockProductTableMap::COL_FK_PRODUCT,
            Criteria::INNER_JOIN
        );
        $baseQuery->withColumn(SpyStockProductTableMap::COL_QUANTITY, 'quantity');
        $baseQuery->withColumn(SpyStockProductTableMap::COL_IS_NEVER_OUT_OF_STOCK, 'is_never_out_of_stock');

        // Category
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductCategoryTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::LEFT_JOIN
        );
        $baseQuery->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );

        $excludeDirectParent = false;
        $excludeRoot = true;

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($baseQuery);
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery);

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryChildren', 'child');

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, $excludeDirectParent, $excludeRoot);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');

        $baseQuery->withColumn(
            'GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)',
            'node_id'
        );
        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );
        $baseQuery->withColumn(
            SpyTouchTableMap::COL_ID_TOUCH,
            self::TOUCH_EXPORTER_ID
        );
        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('abstract_sku');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $processedResultSet = $this->buildProducts($resultSet, $locale);

        $processedResultSet = $this->productSearchFacade->enrichProductsWithSearchAttributes(
            $resultSet,
            $processedResultSet
        );

        foreach ($resultSet as $index => $productRawData) {
            if (isset($processedResultSet[$index])) {
                // Product availability
                $processedResultSet[$index]['available'] = $productRawData['quantity'] > 0;
                $isAvailable = (bool)(
                    $productRawData['is_never_out_of_stock'] ||
                    $productRawData['quantity'] > 0
                );
                $processedResultSet[$index]['search-result-data']['available'] = $isAvailable;
                $processedResultSet[$index]['bool-facet']['available'] = $isAvailable;

                // Category
                $processedResultSet[$index]['category'] = [
                    'direct-parents' => explode(',', $productRawData['node_id']),
                    'all-parents' => explode(',', $productRawData['category_parent_ids']),
                ];

                $touchUpdaterSet->add($index, $resultSet[$index][self::TOUCH_EXPORTER_ID]);
            }
        }

        return $processedResultSet;
    }

    /**
     * @param array $resultSet
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return array
     */
    protected function buildProducts(array &$resultSet, $locale)
    {
        $processedResultSet = [];

        $processedResultSet = $this->productSearchFacade->createSearchProducts($resultSet, $processedResultSet, $locale);

        $keys = array_keys($processedResultSet);
        $resultSet = array_combine($keys, $resultSet);

        return $processedResultSet;
    }

}
